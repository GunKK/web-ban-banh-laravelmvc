@extends('customers.layouts.app')
@section('title', 'payment cancel')
@section('content')
<main id="main" class="mt-5">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
                <div class="alert alert-danger text-center">
                    <div class="mb-2 h5"> <i class="fa-solid fa-triangle-exclamation"></i> Thanh toán đơn hàng thất bại, vui lòng thử phương thức thanh toán khác</div>
                    <a href="{{ route('product') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                </div>
        </div>
    </section>
</main>

@endsection
