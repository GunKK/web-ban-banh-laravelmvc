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
                                        <th scope="col">Khách hàng</th>
                                        <th scope="col">Thành tiền</th>
                                        <th scope="col">Thanh toán</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <th scope="row">{{ $bill->id }}</th>
                                            <td>{{ $bill->user->name }}</td>
                                            <td>{{ number_format($bill->payment_amount) }} VND</td>
                                            <td> {{ $bill->payment_method }} - {{ $bill->status }}</td>
                                            <td>{{ $bill->created_at }}</td>
                                            <td>
                                                <a href="{{ route('bill.edit', ['id' => $bill->id]) }}" class="btn btn-warning">update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            <div>
                                {{ $bills->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- End #main -->
@endsection
