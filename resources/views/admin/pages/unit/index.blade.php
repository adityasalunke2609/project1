@extends('admin.layout.master')
@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title col-md-6">Unit</div>
                    <div class="col-md-6 d-flex justify-content-end ">
                        @include('admin.pages.unit.create')
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
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">SR.No</th>
                            <th scope="col">Unit Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($unit as $data)
                            <tr>

                                <td>{{ $data->unit_id }}</td>
                                <td>{{ $data->unit_name }}</td>
                                <td>
                                    <div class="d-flex gap-5">
                                        <div onclick="editData('{{ $data->unit_id }}','{{ $data->unit_name }}')">
                                            <button type="submit" class="btn "><i
                                                    class="fa-solid fa-pen-to-square text-primary fs-4"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            </button>
                                        </div>

                                        <form action="/admin/unit/delete" method="post">
                                            @csrf
                                            <input type="hidden" name="unit_id" value="{{ $data->unit_id }}">
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

    @include('admin.pages.unit.edit')

    <script>
        function editData(unit_id, unit_name) {
            console.log(unit_id);
            console.log(unit_name);
            document.getElementById('editUnitId').value = unit_id;
            document.getElementById('editUnitName').value = unit_name;
        }
    </script>
@endsection
