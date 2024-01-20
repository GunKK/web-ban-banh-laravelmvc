<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        @if (!Session::has('cart') || empty(Session::get('cart')))
            <div class="alert alert-danger">Bạn chưa có sản phẩm trong giỏ, vui lòng thêm sản phẩm</div>
        @else
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{ route('product') }}" class="text-body"><i
                                                class="bi bi-arrow-left-circle-fill me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                            <p class="mb-0">Bạn có {{ sizeof(Session::get('cart')) }} sản phẩm trong
                                                giỏ</p>
                                        </div>
                                        <div>
                                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach (Session::get('cart') as $item)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-row align-items-center"
                                                        style="width: 220px">
                                                        <div>
                                                            <img src="{{ $item['image'] }}" class="img-fluid rounded-3"
                                                                alt="Shopping item" style="width: 65px;" />
                                                        </div>

                                                        <div class="ms-3">
                                                            <h6>{{ $item['name'] }}</h6>
                                                            <p class="small mb-0">
                                                                ${{ number_format($item['price'], 2) }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-row align-items-center ms-3 justify-content-around"
                                                        style="flex-grow: 1">
                                                        <div>
                                                            <h5 class="fw-normal mb-0">
                                                                <button data-id="{{ $item['id'] }}" data-action="add"
                                                                    class="btn btn-secondary update-cart">
                                                                    <i class="bi bi-plus-lg"></i>
                                                                </button>
                                                                {{ $item['quantity'] }}
                                                                <button data-id="{{ $item['id'] }}" data-action="sub"
                                                                    class="btn btn-secondary update-cart">
                                                                    <i class="bi bi-dash-lg"></i>
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">
                                                                {{ number_format($item['price'] * $item['quantity'], 2) }}
                                                                đ</h5>
                                                        </div>
                                                        <button class="btn btn-danger remove-from-cart"
                                                            data-id="{{ $item['id'] }}"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $totalPrice += $item['price'] * $item['quantity'];
                                        @endphp
                                    @endforeach

                                </div>
                                <div class="col-lg-5">
                                    <div class="list-group">
                                        <li class="list-group-item">Thông tin thanh toán</li>
                                        {{-- <li class="list-group-item">
                                            <input type="text" placeholder="Nhập mã giảm giá" class="form-control">
                                        </li> --}}
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><span class="h6">Tạm tính:</span>
                                            <span>{{ number_format($totalPrice, 2) }}</span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><span class="h6">Giảm giá:</span>
                                            <span>-0đ</span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><span class="h6">Thành tiền (đã gồm VAT):</span>
                                            <span>{{ number_format($totalPrice, 2) }}</li></span>
                                        <li class="list-group-item text-center">
                                            <a href="{{ route('bill.create') }}" class="btn btn-success">Tiến hành thanh toán</a>
                                        </li>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
