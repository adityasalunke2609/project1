@extends('admin.layout.master')
@section('content')
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0">Order Details</h4>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <!-- Order Info -->
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Order ID</th>
                                        <td>{{ $orderMaster->order_master_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer</th>
                                        <td>{{ $orderMaster->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <td>₹ {{ $orderMaster->order_master_total }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Address</th>
                                        <td>{{ $orderMaster->order_master_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pin Code</th>
                                        <td>{{ $orderMaster->order_master_pincode }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Payment Info -->
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>{{ $orderMaster->order_master_payment_mode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Status</th>
                                        <td>{{ $orderMaster->order_master_payment_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>{{ $orderMaster->order_master_status }} </td>
                                    </tr>
                                    <tr>
                                        <th>Receiver Name</th>
                                        <td>{{ $orderMaster->order_master_receiver_name }}</td>
                                    </tr>
                                </table>
                            </div>

                        </div>  

                        <!-- Product Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orderChild as $data)
                                        <tr>
                                            <td>{{ $data->order_child_id }}</td>

                                            <td>
                                                <img src="{{ asset('uploads/products/' . $data->product_image) }}"
                                                    width="50" height="50"
                                                    style="border-radius:6px; object-fit:cover;">
                                            </td>

                                            <td>{{ $data->product_name }}</td>

                                            <td>₹ {{ $data->order_child_cart_price }}</td>

                                            <td>{{ $data->order_child_cart_quantity }}</td>

                                            <td>
                                                ₹ {{ $data->order_child_cart_price * $data->order_child_cart_quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
