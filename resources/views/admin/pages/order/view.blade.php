@extends('admin.layout.master')
@section('content')
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 card-title">Order Details</div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-head-bg-success bg-opacity-10">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($orderChild as $data)
                                <tr>
                                    <td>{{ $data->order_child_id }}</td>

                                    <td><img src="{{ asset('uploads/products/' . $data->product_image) }}" width="50"
                                            height="50"></td>

                                    <td>{{ $data->product_name }}</td>
                                    <td>{{ $data->order_child_cart_price }}</td>
                                    <td>{{ $data->order_child_cart_quantity }}</td>
                                    <td>{{ $data->order_child_cart_price * $data->order_child_cart_quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
