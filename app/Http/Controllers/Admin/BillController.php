<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BillController extends Controller
{
    public function index() {
        $bills = Cache::remember('bills-page-' . request('page', 1), 3600, function() {
            return Bill::with('user')->latest('updated_at')->paginate(6);
        });

        return view('admins.bills.index', compact('bills'));
    }

    public function edit($id)
    {
        $bill = Bill::with('billItems')->findOrFail($id);
        return view('admins.bills.edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = $request->status;
        $bill->save();
        return redirect()->route('bill.edit', ['id' => $id])->with('success','Cập nhật đơn hàng #' . $id . ' thành công');
    }
}
