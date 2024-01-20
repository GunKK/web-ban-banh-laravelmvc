@extends('customers.layouts.app')
@section('title', 'payment')
@section('content')
<main id="main" class="mt-5">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
                <div class="alert alert-success text-center">
                    <div class="mb-2 h5"><i class="fa-solid fa-check"></i> Thanh toán qua paypal</div>
                    <form method="post" action="{{ route('paypal.payment') }}" class="mt-6 space-y-6">
                        @csrf
                        <input type="hidden" name="price" value="{{ $totalPrice }}">
                        <button
                            type="submit"
                            class="btn btn-outline-success"
                        >
                            Thanh toán đơn hàng giá trị {{ $totalPrice }} USD
                        </button>
                    </form>
                    <a href="{{ route('product') }}" class="btn btn-primary mt-5">Tiếp tục mua hàng</a>
                </div>
        </div>
    </section>
</main>

@endsection
