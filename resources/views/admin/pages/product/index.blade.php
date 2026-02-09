@extends('admin.layout.master')
@section('content')
    <div class="page-inner">


        @include('admin.pages.product.create')


        <div class="card">
            <div class="card-header">
                <div class="card-title">Product Category</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
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
                                <td>{{ $data->id }}</td>
                                <td><img src="{{ asset('admin/img/arashmil.jpg') }}"> </td>
                                <td>{{ $data->product_tax }}</td>
                                <td>{{ $data->product_caterogy_id }}</td>
                                <td>{{ $data->product_subcaterogy_id }}</td>
                                <td>Active</td>
                                <td>
                                    @include('admin.pages.product.edit')
                                    <i class="fas fa-trash-alt text-danger fs-2"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
