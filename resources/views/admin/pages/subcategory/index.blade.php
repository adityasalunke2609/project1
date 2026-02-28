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
                                <td>{{ $data->category_name }}</td>
                                <td>{{ $data->subcategory_name }}</td>
                                <td><img src="{{ asset('uploads/subcategory/' . $data->subcategory_image) }}"
                                        height="100">
                                </td>

                                <td>
                                    <div class="d-flex gap-5">

                                        <div
                                            onclick="editData('{{ $data->subcategory_id }}','{{ $data->category_id }}','{{ $data->subcategory_name }}')">
                                            <button type="submit" class="btn"><i
                                                    class="fa-solid fa-pen-to-square text-success fs-3"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            </button>
                                        </div>

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

    @include('admin.pages.subcategory.edit')
    <script>
        function editData(subcategory_id, category_id, subcategory_name) {
            console.log(subcategory_id);
            console.log(category_id);
            console.log(subcategory_name);
            document.getElementById('editSubCategoryId').value = subcategory_id;
            document.getElementById('editCategoryId').value = category_id;
            document.getElementById('editSubCategoryName').value = subcategory_name;
        }
    </script>
@endsection
