@extends('website.layout.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Wish List</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Wish List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table shopping-cart-table">
                            <thead>
                                <tr class="bg-warning p-2 shadow">
                                    <th>Product</th>
                                    <th>Details</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($wishlist as $data)
                                    <tr>
                                        <!-- Product -->
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('website/img/shopping-cart/cart-1.jpg') }}"
                                                    alt="" width="80">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $data->product_name }}</h6>
                                            </div>  
                                        </td>

                                        <!-- Quantity -->
                                        <td class="quantity__item text-center">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="1" >
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Total -->
                                        <td class="cart__price text-center">
                                            ${{ $data->product_mrp}}
                                        </td>

                                         <form action="/remove-from-wishlist" method="post">
                                            @csrf
                                            <input type="hidden" name="wishlistId" value="{{ $data->wishlist_id }}">
                                            <td class="cart__close"><button type="submit" class="border-0"><i
                                                        class="fa fa-close"></i></button></td>
                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection
