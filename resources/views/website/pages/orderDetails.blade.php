@extends('website.layout.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Details</h4>
                        <div class="breadcrumb__links">
                            <a href="/master">Home</a>
                            <a href="/master/shop">Shop</a>
                            <span>Order Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Order Details Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orderDetails as $item)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('uplode/product/' . $item->product_image) }}"
                                                    alt="" height="120" width="120">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $item->product_name }}</h6>
                                                <h5>₹{{ $item->order_child_cart_price }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="{{ $item->order_child_cart_quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">₹{{ $item->product_mrp * $item->order_child_cart_quantity }}
                                        </td>
                                        <td class="cart__close"><i class="fa fa-close"></i></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Section End -->
@endsection
