@extends('admin.layout.master')
@section('content')
    <div class="page-inner">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title col-md-6">Product Category</div>
                    <div class="col-md-6 d-flex justify-content-end ">
                        @include('admin.pages.subcategory.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-head-bg-secondary">
                    <thead>
                        <tr>
                            <th scope="col">SR.NO</th>
                            <th scope="col">CATEGORY NAME</th>
                            <th scope="col">SUB CATEGORY NAME</th>
                            <th scope="col">SUB CATEGORY IMAGE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subcategory as $data)
                            <tr>
                                <td>{{ $data->subcategory_id }}</td>
                                <td>{{ $data->category_id }}</td>
                                <td>{{ $data->subcategory_name }}</td>
                                <td><img src="{{ asset('uploads/subcategory/' . $data->subcategory_image) }}" height="100">
                                </td>

                                <td>
                                    <div class="d-flex gap-5">
                                        @include('admin.pages.subcategory.edit')
                                        <form action="/admin/subcategory/delete" method="post">
                                            <input type="hidden" name="subcategory_id" value="{{ $data->subcategory_id }}">
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
