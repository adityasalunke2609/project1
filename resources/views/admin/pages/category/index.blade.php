@extends("admin.layout.master")
@section("content")
    <div class="page-inner">


        @include("admin.pages.category.create")


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
                            <th scope="col">CATEGORY IMAGES</th>
                            <th scope="col">CATEGORY BANNER IMAGES</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td><img src="{{ asset('admin/img/arashmil.jpg') }}"> </td>
                            <td><img src="{{ asset('admin/img/chadengle.jpg') }}"> </td>
                            <td>
                                @include("admin.pages.category.edit")
                                    <i class="fas fa-trash-alt text-danger fs-2"></i></td>



                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection