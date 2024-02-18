@extends('customers.layouts.app')
@section('title', 'payment success')
@section('content')
<main id="main" class="mt-5">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
                <div class="alert alert-success text-center">
                    <div class="mb-2 h5"><i class="fa-solid fa-check"></i> Thanh toán online thành công</div>
                    <a href="{{ url('/product?categoryId=1') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                </div>
        </div>
    </section>
</main>

@endsection
