@extends('website.layout.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach ($category as $data)
                                                        <li><a href="#">{{ $data->category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Sub Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach ($subcategory as $data)
                                                        <li><a href="#">{{ $data->subcategory_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 112 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach ($products as $data)
                            <div class="col-lg-4 col-md-6 col-sm-12">

                                <div class="card h-80 shadow-lg border-0 mt-3 position-relative overflow-hidden">

                                    <!-- Image -->
                                    <div class="position-relative">
                                        <img src="{{ asset('uploads/products/' . $data->product_image) }}"
                                            class="card-img-top" style="height:250px; object-fit:cover;" alt="">

                                        <!-- Icons (same type as first card) -->
                                        <ul class="list-unstyled d-flex gap-2 position-absolute top-0 end-0 m-2">

                                            <!-- Wishlist -->
                                            <li>
                                                <form action="/add-to-wishlist" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $data->product_id }}">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ Auth::user()?->id ?? 0 }}">
                                                    <button type="submit"
                                                        class="btn btn-light btn-sm rounded-circle shadow-sm">
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
                                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm">
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
                                            ₹ {{ $data->product_mrp }}
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a href="#">1</a>
                                <a class="active" href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
