@extends('admin.layout.master')
@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="card-title col-md-6">Product Category</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        @include('admin.pages.product.create')
                    </div>
                </div>
                
            </div>
            <div class="card-body">
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
                                <td><img src="{{ asset('admin/img/arashmil.jpg') }}"> </td>
                                <td>{{ $data->product_tax }}</td>
                                <td>{{ $data->product_caterogy_id }}</td>
                                <td>{{ $data->product_subcaterogy_id }}</td>
                                <td>Active</td>
                                <td>
                                    @include('admin.pages.product.edit')
                                    <i class="fas fa-trash-alt text-danger fs-4"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
