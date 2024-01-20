@extends('customers.layouts.app')
@section('title', 'checkout')
@section('content')
<div id="checkout">

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            @if (!Session::has('cart') || empty(Session::get('cart')))
                <div class="alert alert-danger">Bạn chưa có sản phẩm trong giỏ, vui lòng thêm sản phẩm</div>
            @else
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <form action="{{ route('bill.store') }}" method="post" class="row">

                                    <div class="col-lg-6 col-md-12">
                                        <h5 class="mb-3"><a href="{{ route('product') }}" class="text-body"><i
                                                    class="bi bi-arrow-left-circle-fill me-2"></i>Continue shopping</a></h5>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Thông tin khách hàng</p>
                                            </div>
                                            <div>
                                                <p class="mb-0"><span class="text-muted">Vai trò:</span> <a href="#!"
                                                        class="text-body">Khách hàng <i class="fas fa-angle-down mt-1"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="receiver" placeholder="Tên người nhận: ..." required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone_receiver" placeholder="Số điện thoại (+84) ..." required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address_receiver" placeholder="Địa chỉ nhận hàng" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="note" placeholder="Ghi chú, lời nhắn">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="list-group">
                                            <li class="list-group-item"><span class="h6 text-dark">Thông tin đơn hàng</span></li>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @foreach (Session::get('cart') as $item)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="h6">{{ $item['name'] }}</span>
                                                    <span>{{ $item['quantity'] }} x {{ $item['price'] }}</span>
                                                    <span>{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                                </li>
                                                @php
                                                    $totalPrice += $item['price'] * $item['quantity'];
                                                @endphp
                                            @endforeach
                                            <input type="hidden" name="payment_amount" value="{{ $totalPrice }}">
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><span class="h6">Tạm tính:</span>
                                                <span class="text-success h6">{{ number_format($totalPrice, 2) }} đ</span>
                                            </li>
                                            <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" value="Cash" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            <i class="fa-solid fa-sack-dollar"></i> Tiền mặt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" value="Paypal" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            <i class="fa-brands fa-cc-paypal"></i> Paypal
                                                        </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-center">
                                                <button type="submit" class="btn btn-success">Đặt hàng</button>
                                            </li>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

</div>
@endsection
