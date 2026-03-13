@extends('admin.layout.master')
@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="card-title col-md-6">Product List</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        @include('admin.pages.product.create')
                    </div>
                </div>

            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-head-bg-secondary">
                    <thead>
                        <tr>
                            <th scope="col">SR.NO</th>
                            <th scope="col">IMAGES</th>
                            <th scope="col">Tax</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col"> SUB CATEGORY</th>
                            <th scope="col"> PRODUCT STATUS</th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product as $data)
                            <tr>
                                <td>{{ $data->product_id }}</td>
                                <td><img src="{{ asset('uploads/products/' .json_decode($data->product_image)[0]) }}" width="100"
                                        height="100"> </td>
                                <td>{{ $data->tax_name }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td>{{ $data->subcategory_name }}</td>
                                <td>Active</td>

                                <td>
                                    <div class="d-flex gap-5">
                                        <div
                                            onclick="editData('{{ $data->product_id }}','{{ $data->product_tax }}','{{ $data->product_caterogy_id }}','{{ $data->product_subcaterogy_id }}')">
                                            <button type="submit" class="btn "><i
                                                    class="fa-solid fa-pen-to-square text-primary fs-2"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            </button>
                                        </div>

                                        <form action="/admin/product/delete" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $data->product_id }}">
                                            <button type="submit" class="btn">
                                                <i class="fas fa-trash-alt text-danger fs-4"></i>
                                            </button> 
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.pages.product.edit')
    <script>
        function editData(product_id, product_tax, product_caterogy_id, product_subcaterogy_id) {
            document.getElementById('editProductId').value = product_id;
            document.getElementById('editProductTax').value = product_tax;
            document.getElementById('editProductCategoryId').value = product_caterogy_id;
            document.getElementById('editProductSubCategoryId').value = product_subcaterogy_id;
        }
    </script>
@endsection
