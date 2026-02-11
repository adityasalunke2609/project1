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

                                        <div onclick="editData('{{ $data->tax_id }}','{{ $data->tax_name }}','{{ $data->tax_percentage }}')">
                                            <button type="submit" class="btn "><i
                                                    class="fa-solid fa-pen-to-square text-primary fs-4"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            </button>
                                        </div>


                                        <form action="/admin/tax/delete" method="post">
                                            @csrf
                                            <input type="hidden" name="tax_id" value="{{ $data->tax_id }}">
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
    @include('admin.pages.tax.edit')

    <script>
        function editData(tax_id, tax_name,tax_percentage) {
            console.log(tax_id);
            console.log(tax_name);
            console.log(tax_percentage);
            document.getElementById('editTaxId').value = tax_id;
            document.getElementById('editTaxName').value = tax_name;
            document.getElementById('editTaxPercentege').value = tax_percentage;
        }
    </script>
@endsection
