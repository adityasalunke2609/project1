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

                                        @include('admin.pages.unit.edit')

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
@endsection
