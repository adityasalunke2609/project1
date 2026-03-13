@extends('website.layout.master')
@section('content')
    @include('website.component.hero')
    @include('website.component.banner')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($products as $data)
                    @php
                        $images = json_decode($data->product_image);
                    @endphp

                    <div class="col-lg-3 col-md-6 col-sm-12">

                        <div class="card h-80 shadow-lg border-0 mt-3 position-relative overflow-hidden">

                            <!-- Image -->
                            <div class="position-relative">
                                <img src="{{ asset('uploads/products/' . $images[0]) }}" class="card-img-top"
                                    style="height:250px; object-fit:cover;" alt="">

                                <!-- Icons (same type as first card) -->
                                <ul class="list-unstyled d-flex gap-2 position-absolute top-0 end-0 m-2">

                                    <!-- Wishlist -->
                                    <li>
                                        <form action="/add-to-wishlist" method="POST">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $data->product_id }}">

                                            <button type="submit" class="btn btn-light btn-sm rounded-circle shadow-sm">
                                                <i class="fa fa-heart text-danger"></i>
                                            </button>
                                        </form>
                                    </li>

                                    <!-- Compare -->
                                    <li>
                                        <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm">
                                            <i class="fa fa-exchange"></i>
                                        </a>
                                    </li>

                                    <!-- Search -->
                                    <li>
                                        <a href="" class="btn btn-light btn-sm rounded-circle shadow-sm">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body text-center">

                                <h6 class="card-title fw-bold">
                                    {{ $data->product_name }}
                                </h6>

                                <p class="text-danger fw-semibold mb-2">
                                    ₹. {{ $data->product_mrp }}
                                </p>

                                <div class="mb-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-muted"></i>
                                </div>

                                <form action="/add-to-cart" method="post">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $data->product_id }}">
                                    <input type="hidden" name="userId" value="{{ Auth::user()->id ?? 0 }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-dark btn-sm px-4 rounded-pill">
                                        + Add To Cart
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    @include('website.component.categories')
    @include('website.component.instagram')
    @include('website.component.search')
    @include('website.component.blog')
@endsection
