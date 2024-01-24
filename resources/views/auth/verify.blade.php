@extends('customers.layouts.app')
@section('title', 'verify email')
@section('content')
    <div class="container-fluid login-wrap">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-xl-4 col-ms-6 col-sm-12 text-center">
                <div class="card">
                    <div class="card-header">Verify Account</div>
                    <div class="card-body">
                        <p>Tài khoản của bạn chưa được xác thực, vui lòng kiểm tra email và xác thực</p>
                        <p class="text-center">
                            <form action="{{ route('verification.send') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning">Gửi lại mã xác thực</button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
