@extends('admin.layout.master')
@section('content')
    <div class="page-inner">


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title col-md-6 ">Product Category</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        @include('admin.pages.category.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-head-bg-secondary">
                    <thead>
                        <tr>
                            <th scope="col">SR.NO</th>
                            <th scope="col">CATEGORY NAME</th>
                            <th scope="col">CATEGORY IMAGES</th>
                            <th scope="col">CATEGORY BANNER IMAGES</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($category as $data)
                            <tr>
                                <td>{{ $data->category_id }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td><img src="{{ asset('admin/img/arashmil.jpg') }}"> </td>
                                <td><img src="{{ asset('admin/img/chadengle.jpg') }}"> </td>

                                <td>
                                    <div class="d-flex gap-5">
                                        @include('admin.pages.category.edit')

                                        <form action="/admin/category/delete" method="post">
                                            <input type="hidden" name="category_id" value="{{ $data->category_id }}">
                                            @csrf
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
@endsection
