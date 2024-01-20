@extends('customers.layouts.app')
@section('title', 'Bill')
@section('content')

    <section class="mt-5">
        <div class="container">

            @foreach ( $bills as $bill )
            <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="col-lg-6 col-md-12">
                    <div class="mb-3">  <span class="h6">Mã hóa đơn</span> <span class="text-priamry">{{ $bill->id }}</span></div>
                    <div class="mt-1">
                        <span class="h6">Người nhận:</span> {{ $bill->receiver }}
                    </div>
                    <div class="mt-1">
                        <span class="h6">Địa chỉ:</span> {{ $bill->address_receiver }}
                    </div>
                    <div class="mt-1">
                        <span class="h6">Thanh toán:</span> {{ $bill->payment_status }}
                    </div>
                    <div class="mt-1">
                        <span class="h6">Phương thức thanh toán:</span> {{ $bill->payment_method == 'Cash' ? 'Tiền mặt' : 'Paypal' }}
                    </div>
                    <div class="mt-1">
                        <span class="h6">Trạng thái giao hàng:</span> {{ $bill->status }}
                    </div>
                    <div class="mt-1">
                        <span class="h6">Ghi chú:</span> {{ $bill->note }}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <thead class="table-warning">
                            <tr>
                                <th scope="col">Mặt hàng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        @foreach ( $bill->billItem as $item )
                            <tr>
                                <td scope="row">
                                    <span class="h6">{{ $item->product->name }}: </span>
                                </td>
                                <td>
                                    {{ $item->price_item }}
                                </td>
                                <td>
                                    <small>{{ $item->quantity }}</small>
                                </td>
                                <td>
                                    {{ number_format($item->price_item * $item->quantity)}}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td scope="row">
                                <span class="h6">Tổng tiền (VAT):</span>
                            </td>
                            <td colspan="3">
                                <span class="text-success h6">{{ number_format( $bill->payment_amount) }} VND</span>
                            </td>
                        </tr>
                    </table>
                    <div class="mt-1">
                        <span class="h6">Ngày đặt:</span> <small class="text-success">{{ $bill->created_at }}</small>
                    </div>
                    <div class="mt-1">
                        <span class="h6">Cập nhật:</span> <small class="text-success">{{ $bill->updated_at }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
