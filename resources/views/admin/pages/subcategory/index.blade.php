@extends("admin.layout.master")
@section("content")
    <div class="page-inner">


        @include("admin.pages.subcategory.create")


        <div class="card">
            <div class="card-header">
                <div class="card-title">Product Category</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
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
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td><img src="{{ asset('') }}"> </td>
                            <td><img src="{{ asset('') }}"> </td>
                            <td> @include("admin.pages.subcategory.edit")
                                <i class="fas fa-trash-alt text-danger fs-3"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection