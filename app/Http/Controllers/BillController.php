<?php

namespace App\Http\Controllers;

use App\Enums\BillStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Http\Requests\CreateBillRequest;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\BillItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class BillController extends Controller
{
    public function create() {
        return view('customers.checkout');
    }

    public function store(CreateBillRequest $request) {
        DB::beginTransaction();
        try {
            $bill = new Bill();
            $bill->payment_amount = (float) $request->payment_amount;
            $bill->payment_method = $request->payment_method;
            $bill->status = BillStatus::Processing;
            $bill->payment_status = PaymentStatus::Incomplete;
            $bill->user_id = Auth::user()->id;
            $bill->receiver = $request->receiver ?? Auth::user()->name;
            $bill->address_receiver = $request->address_receiver;
            $bill->phone_receiver = $request->phone_receiver;
            $bill->note = $request->note ?? null;
            $bill->save();

            foreach (session()->get('cart', []) as $key => $value) {
                $billItem = new BillItem();
                $billItem->bill_id = $bill->id;
                $billItem->product_id = $key;
                $billItem->price_item = $value['price'];
                $billItem->quantity = $value['quantity'];
                $billItem->save();
            }

            DB::commit();
            $request->session()->forget('cart');
            switch ($request->payment_method) {
                case PaymentMethod::Paypal:
                    return redirect()->route('paypal.create')->with('success', 'Đặt hàng thành công');
                    break;
                case PaymentMethod::Cash:
                    return redirect()->route('bill.index')->with('success', 'Đặt hàng thành công');
                    break;
                default:
                    # code...
                    return redirect()->to('/');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Mã lỗi' . $e->getMessage()]);
        }
    }

    public function index() {
        $bills = Bill::with(['billItem'])->whereUserId(Auth::user()->id)->get();
        return view('customers.bills.index', compact('bills'));
    }
}
