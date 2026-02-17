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
                                <td><img src="{{ asset('uploads/category/'.$data->category_image) }}" height="100"> </td>
                                <td><img src="{{ asset('uploads/category/'.$data->category_banner_image) }}" height="100"> </td>

                                <td>
                                    <div class="d-flex gap-5">
                                        
                                        <div onclick="editData('{{ $data->category_id }}','{{ $data->category_name }}')">
                                            <button type="submit" class="btn "><i
                                                    class="fa-solid fa-pen-to-square text-primary fs-2"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            </button>
                                        </div>

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

    @include('admin.pages.category.edit')

    <script>
        function editData(category_id, category_name) {
            console.log(category_id);
            console.log(category_name);
            document.getElementById('editcategoryId').value = category_id;
            document.getElementById('editCategoryName').value = category_name;
        }
    </script>

@endsection
