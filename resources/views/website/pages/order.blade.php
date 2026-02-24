@extends('website.layout.master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>My Orders</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <a href="/shop">Shop</a>
                        <span>My Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Order Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table shopping-cart-table">
                        <thead>
                            <tr class="bg-warning shadow">
                                <th>Product</th>
                                <th>Details</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($order as $data)
                                <tr>
                                    <!-- Product Image -->
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset('uploads/products/' . $data->product_image) }}"
                                                 width="80">
                                        </div>
                                    </td>

                                    <!-- Product Name -->
                                    <td>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $data->product_name }}</h6>
                                            <small>Order ID: #{{ $data->order_id }}</small>
                                        </div>
                                    </td>

                                    <!-- Quantity -->
                                    <td class="text-center">
                                        {{ $data->quantity }}
                                    </td>

                                    <!-- Total -->
                                    <td class="cart__price text-center">
                                        ₹{{ $data->total_price }}
                                    </td>

                                    <!-- Status -->
                                    <td class="text-center">
                                        @if ($data->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($data->status == 1)
                                            <span class="badge badge-success">Completed</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <a href="{{ url('order-details/' . $data->order_id) }}"
                                           class="btn btn-sm btn-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No orders found     
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Order Section End -->

@endsection