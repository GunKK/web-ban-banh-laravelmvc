<div class="row">
    @foreach ( $products as $product )
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <img src="{{ $product->images }}" class="w-100" style="height: 264px" />
            </a>
            <a href="#!">
                <div class="mask">
                    <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-primary ms-2">New</span></h5>
                    </div>
                </div>
                <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
            </a>
        </div>
        <div class="card-body">
            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="text-reset">
                <h6 class="card-title mb-3">{{ $product->name }}</h6>
            </a>
            <a href="#" class="text-reset">
                <p>{{ $product->category->name }}</p>
            </a>
            <div>
                <span class="text-danger"><s>$49.99</s></span>
                <span class="mb-3 h6">${{ $product->price_base }}</span>
            </div>
            <div>
                <button data-id="{{ $product->id }}" class="add-to-cart btn btn-primary shadow-0 me-1">Add to cart</button>
                <button class="btn btn-light border icon-hover px-2 pt-2"><i class="bi bi-heart text-danger px-1"></i></button>
            </div>
        </div>
        </div>
    </div>
    @endforeach
</div>
