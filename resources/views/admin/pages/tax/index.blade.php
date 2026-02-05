@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        @include("admin.pages.tax.create")

        <div class="card">
            <div class="card-header">
                <div class="card-title">Tax</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR.No</th>
                            <th scope="col">Tax Name</th>
                            <th scope="col"> Tax Percentage</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $tax as $data)

                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->tax_name }}</td>
                            <td>{{ $data->tax_percentage }}</td>
                            <td>
                                @include("admin.pages.tax.edit")
                                    <i class="fas fa-trash-alt text-danger fs-4"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection