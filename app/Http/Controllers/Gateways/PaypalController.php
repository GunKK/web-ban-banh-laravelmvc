<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Enums\PaymentStatus;

class PaypalController extends Controller
{
    public function create() {
        $totalPrice = floor(Bill::whereUserId(3)->latest('updated_at')->first()->payment_amount / 24550);
        return view('customers.payment', compact('totalPrice'));
    }

    public function payment(Request $request) {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] !== null) {
            foreach ($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
        return redirect()->route('paypal.cancel');
    }
    public function success(Request $request) {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            Bill::whereUserId(Auth::user()->id)->latest('updated_at')->take(1)->update(['payment_status' => PaymentStatus::Complete]);
            return view('customers.payments.success');
        }
        return view('customers.payments.cancel');
    }


    public function cancel() {
        return view('customers.payments.cancel');
    }
}
