@extends('admin.layout.master')
@section('content')
    <div class="page-inner">

        @include('admin.pages.unit.create')

        <div class="card">
            <div class="card-header">
                <div class="card-title">Unit</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR.No</th>
                            <th scope="col">Unit Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unit as $data)
                            <tr>

                                <td>{{ $data->id }}</td>
                                <td>{{ $data->unit_name }}</td>
                                <td>
                                    @include('admin.pages.tax.edit')
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
