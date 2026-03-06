@extends('website.layout.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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

                                @foreach ($cart as $data)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('uploads/products/' . $data->product_image) }} "
                                                    width="100" height="120">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $data->product_name }}</h6>
                                                <h5>${{ $data->product_sale }}</h5>
                                            </div>
                                        </td>

                                        
                                        {{-- <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $data->cart_quantity }}">
                                                </div>
                                            </div>
                                        </td> --}}

                                        <td>
                                            <form action="{{ url('/update-to-cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="cartID" value="{{ $data->cart_id }}">
                                                <input type="hidden" name="productId" value="{{ $data->product_id }}">
                                                <input type="hidden" name="price" value="{{ $data->cart_price }}">
                                                <input type="hidden" name="total" value="{{ $data->cart_total }}">
                                                <input type="hidden" name="userId"value="{{ $data->user_id }}">
                                                <input type="hidden" name="totalAmount"value="{{ $data->user_id }}">

                                                <input type="number" name="quantity" value="{{ $data->cart_quantity }}"
                                                    min="1" class="form-control w-50 d-inline-block" onchange="this.form.submit()">
                                            </form>
                                        </td>

                                        <td class="cart__price">${{ $data->cart_total}}</td>
                                        <form action="{{ url('/remove-from-cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="cartID" value="{{ $data->cart_id }}">
                                            <td class="cart__close"><button type="submit" class="border-0">
                                                    <i class="fa fa-close"></i>
                                                </button></td>
                                        </form>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{$cart->sum('cart_total') }}</span></li>
                            <li>Total <span>{{$cart->sum('cart_total') }}</span></li>
                        </ul>

                        <form action="/checkOut" method="POST">
                            @csrf

                            @foreach ($cart as $data)
                                <input type="hidden" name="product_id" value="{{ $data->product_id }}">
                                <input type="hidden" name="cart_price" value="{{ $data->cart_price }}">
                                <input type="hidden" name="cart_quantity" value="{{ $data->cart_quantity }}">
                                <input type="hidden" name="cart_total" value="{{ $data->cart_total }}">
                                <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                <input type="hidden" name="totalAmount" value="{{$cart->sum('cart_total') }}">
                            @endforeach

                            <button type="submit" class="primary-btn btn px-s mx-4">
                                Proceed to Checkout 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
