@foreach (Session::get('cart') as $item)
<li class="cart-header__item">
    <a class="cart-header__link" href="#">
        <div class="cart-header__item-img"><img class="rounded-circle" width="80px" height="80px"
                src="{{ $item['image'] }}" alt=""></div>
        <div class="cart-header__item-info ms-2 d-flex flex-column align-items-baseline">
            <div class="cart-header__item-name">{{ $item['name'] }} </div>
            <div class="cart-header__item-price" style="width: 100%">
                <div>
                    ${{ $item['price'] }} x <small class="text-primary">{{ $item['quantity'] }}</small>
                </div>
                <div class="text-primary">Tiền: ${{ $item['price'] * $item['quantity'] }}</div>
            </div>
        </div>
    </a>
</li>
@endforeach
<li class="cart-header__item p-2">
    <a class="btn btn-primary text-light" href="{{ route('cart') }}"><span class="text-center w-100">View cart</span></a>
</li>
