@extends('admin.layout.master')
@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title
                        col-md-6">Order</div>
                    <div class="col-md-6 d-flex justify-content-end ">
                        {{-- @include('admin.pages.unit.create') --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->customer_name }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->total_price }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($data->status == 1)
                                            <span class="badge badge-success">Completed</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('order.edit', $data->order_master_id) }}"
                                                class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"
                                                data-toggle="tooltip">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    {{-- @include('admin.pages.unit.edit') --}}

    <script>
        function editData() {
            console.log(order_id);
            console.log(order_name);
        }
    </script>
@endsection
