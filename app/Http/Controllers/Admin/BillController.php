<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index() {
        $bills = Bill::with('user')->latest('updated_at')->paginate(6);
        return view('admins.bills.index', compact('bills'));
    }

    public function edit($id)
    {
        $bill = Bill::with('billItem')->findOrFail($id);
        return view('admins.bills.edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = $request->status;
        $bill->save();
        return redirect()->route('bill.edit', ['id' => $id])->with('success','Cập nhật đơn hàng #' . $id . 'thành công');
    }
}