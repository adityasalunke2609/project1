@extends("admin.layout.master")
@section("content")
    <div class="page-inner">


        @include("admin.pages.product.create")


        <div class="card">
            <div class="card-header">
                <div class="card-title">Product Category</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">SR.NO</th>
                            <th scope="col">IMAGES</th>
                            <th scope="col">Tax</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col"> SUB CATEGORY</th>
                            <th scope="col"> PRODUCT STATUS</th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('admin/img/arashmil.jpg') }}"> </td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>
                                @include("admin.pages.product.edit")
                                <i class="fas fa-trash-alt text-danger fs-2"></i>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection