@extends('admin.layout.master')
@section('content')
    <div class="page-inner">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title col-md-6">tax</div>
                    <div class="col-md-6 d-flex justify-content-end ">
                        @include('admin.pages.tax.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-head-bg-secondary">
                    <thead>
                        <tr>
                            <th scope="col">SR.No</th>
                            <th scope="col">Tax Name</th>
                            <th scope="col"> Tax Percentage</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tax as $data)
                            <tr>
                                <td>{{ $data->tax_id }}</td>
                                <td>{{ $data->tax_name }}</td>
                                <td>{{ $data->tax_percentage }}</td>
                                <td>
                                    <div class="d-flex gap-5">

                                        <div class="btn"
                                            onclick="editData('{{ $item->id }}','{{ $item->tax_name }}')">
                                            @include('admin.pages.tax.edit')
                                        </div>


                                        <form action="/admin/category/delete" method="post">
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
