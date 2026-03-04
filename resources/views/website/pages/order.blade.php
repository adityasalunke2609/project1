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

                                @foreach ($order as $data)
                                    <tr>
                                        <td class="cart_price">{{ $data->order_master_id }}</td>
                                        <td class="cart_price">{{ $data->created_at }}</td>
                                        <td class="cart_price">{{ $data->order_master_total }}</td>
                                        <td class="cart_price">{{ $data->order_master_payment_status }}</td>
                                        <td class="cart_price">{{ $data->order_master_payment_mode }}</td>
                                        <td class="cart_price">{{ $data->order_master_status }}</td>

                                        <td class="cart__close"><a href="/order/view/{{ $data->order_master_id }}"><i
                                                    class="fa fa-eye"></i></a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Section End -->
@endsection
