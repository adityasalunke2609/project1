@extends('admin.layout.master')
@section('content')
    <div class="page-inner">


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="card-title col-md-6">Order</div>
                    <div class="col-md-6 d-flex justify-content-end"></div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order as $data)
                                <tr>
                                    <td>{{ $data->order_master_id }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->name }}</td> {{-- FIXED --}}
                                    <td>{{ $data->order_master_total }}</td>
                                    <td>{{ $data->order_master_payment_status }}</td>
                                    <td>{{ $data->order_master_payment_mode }}</td>
                                    <td>{{ $data->order_master_status }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="/admin/order/view/{{ $data->order_master_id }}" class="mx-2">
                                                <i class="fa fa-eye fs-5"></i>
                                            </a>

                                            <div onclick="editData('{{ $data->order_master_id }}',
                                        '{{ $data->order_master_user_id }}',
                                        '{{ $data->order_master_total }}',
                                        '{{ $data->order_master_payment_status }}',
                                        '{{ $data->order_master_payment_mode }}',
                                        '{{ $data->order_master_status }}',
                                        '{{ $data->created_at }}')"
                                                class="mx-2">

                                                <button type="button" class="bg-transparent border-0">
                                                    <i class="fa-solid fa-pen-to-square text-primary fs-5"
                                                        data-bs-toggle="modal" data-bs-target="#editorder"></i>
                                                </button>
                                            </div>

                                            <form action="/admin/order/delete" method="POST">
                                                @csrf
                                                <input type="hidden" name="order_master_id"
                                                    value="{{ $data->order_master_id }}">

                                                <button class="bg-transparent border-0">
                                                    <i class="fa-solid fa-trash text-danger fs-5"></i>
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
    </div>

    @include('admin.pages.order.edit')

    <script>
        function editData(order_master_id, order_master_user_id, order_master_total,
            order_master_paymentstatus, order_master_paymentmethod,
            order_master_orderstatus, created_at) {

            document.getElementById('order_master_id').value = order_master_id;
            document.getElementById('order_master_user_id').value = order_master_user_id;
            document.getElementById('order_master_total').value = order_master_total;
            document.getElementById('order_master_paymentstatus').value = order_master_paymentstatus;
            document.getElementById('order_master_paymentmethod').value = order_master_paymentmethod;
            document.getElementById('order_master_orderstatus').value = order_master_orderstatus;
            document.getElementById('created_at').value = created_at;
        }
    </script>
@endsection
