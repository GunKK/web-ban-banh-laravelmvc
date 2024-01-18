@extends('customers.layouts.app')
@section('title', 'Product')
@section('content')

    <section class="mt-5">
        <div class="container">

            <form action="{{ route('product') }}" method="get">
                <div class="row">

                    @csrf
                    <!-- sidebar -->
                    @include('customers.layouts.sidebar')
                    <!-- sidebar -->
                    <!-- content -->
                    <div class="col-lg-9">
                        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                            <strong class="d-block py-2">{{ $count }} Items found </strong>
                            <div class="ms-auto">
                                <span>Số sản phẩm</span>
                                <select name="limit" class="form-select d-inline-block w-auto border pt-1">
                                    <option @if ($limit == 6) selected @endif value="6">6 sản phẩm</option>
                                    <option @if ($limit == 9) selected @endif value="9">9 sản phẩm</option>
                                    <option @if ($limit == 12) selected @endif value="12">12 sản phẩm</option>
                                    <option @if ($limit == 15) selected @endif value="15">15 sản phẩm</option>
                                </select>
                            </div>
                            <div class="ms-auto">
                                <span>Sắp xếp theo</span>
                                <select name="sortASC" class="form-select d-inline-block w-auto border pt-1">
                                    <option @if ($sortASC == "ASC") selected @endif value="0">Từ giá thấp đến cao</option>
                                    <option @if ($sortASC == "DESC") selected @endif value="1">Từ giá cao đến thấp</option>
                                </select>
                            </div>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-success">Áp dụng</button>
                            </div>
                        </header>

                        @include('customers.products.product_list')

                        <hr />

                        <!-- Pagination -->
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                            {{ $products->links() }}
                        </nav>
                        <!-- Pagination -->
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
