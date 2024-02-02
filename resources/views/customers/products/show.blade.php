@extends('customers.layouts.app')
@section('title', 'Product Details')
@section('content')
<div class="container-fluid" style="padding: 150px 0; background-color: #EDF1F5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="section-header">
                    <h2>Thông tim sản phẩm</h2>
                    <p>Bánh <span>{{ $product->name }}</span></p>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="{{ $product->images }}" class="w-100 img-responsive"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Mô tả sản phẩm</h4>
                        <p>{!! $product->description !!}</p>
                            <h4 class="mt-5">
                                Giá bán: ${{ $product->price_base }}<small class="text-success">(36%off)</small>
                            </h4>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                            <i class="bi bi-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                        <h3 class="box-title mt-5">Key Highlights</h3>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                        </ul>
                    </div>
                </div>

            </div>
            <section id="gallery" class="gallery section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Sản phẩm tương tự</h2>
                        <p>Check <span>Our Gallery</span></p>
                    </div>

                    <div class="gallery-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ( $sameProducts as $sameProduct)
                                <div class="swiper-slide">
                                    <a href="{{ route('product.show', ['id' => $sameProduct->id]) }}">
                                        <img src="{{ $sameProduct->images }}" class="img-fluid" alt="" />
                                        <div>{{ $sameProduct->name }}</div>
                                        <div class="text-success text-sm">${{ $sameProduct->price_base }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </section>
        </div>

        @include('customers.products.partials.comment')
        @include('customers.products.partials.create_comment_modal')
    </div>
</div>
@endsection

@section('scrips')
<script>
    $(".btn-get-reply").click(function(e) {
        e.preventDefault();
        console.log($(this))
        const id = $(this).attr("data-id");
        console.log("parent id is: " , id);
        $.ajax({
            url: '{{ route('comment.getReplies') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                product_id: '{{ $product->id }}'
            },
            success: function(res) {
            console.log(res.replies);
            $(`#reply-of-${id}`).html(res.replies);
            },
            error: function(message) {
                console.log(message.responseJSON)
            }
        });
    });
</script>
@endsection
