@extends('admins.layouts.app')
@section('title', 'manage product')
@section('content')
    <div id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to conver to a datatable</p>

                            <!-- Table with stripped rows -->
                            <table id="table-product" class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Updated_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ $product->images }}" width="50px" class="rounded-circle"
                                                    alt=""></td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('product.restore', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm w-100" type="submit"
                                                        title="Delete">Restore</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            <div>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div><!-- End #main -->
@endsection
