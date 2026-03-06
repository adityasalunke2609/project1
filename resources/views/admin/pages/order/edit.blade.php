<div class="modal fade" id="editOrderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Order</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="/admin/order/edit" method="post">
                @csrf
                <input type="hidden" name="order_master_id" id="order_master_id">

                <div class="modal-body">

                    <div class="row g-3">
                        <!-- Order Date -->
                        <div class="col-md-6">
                            <label class="form-label">Order Date</label>
                            <input type="text" name="order_date" id="order_date" class="form-control" readonly>
                        </div>

                        <!-- Customer Name -->
                        <div class="col-md-12">
                            <label class="form-label">Customer Name</label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control" readonly>
                        </div>

                        <!-- Total Amount -->
                        <div class="col-md-6">
                            <label class="form-label">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                        </div>

                        <!-- Payment Status -->
                        <div class="col-md-6">
                            <label class="form-label">Payment Status</label>
                            <select name="payment_status" class="form-select" id="payment_status">
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select" id="payment_method">
                                <option value="cash on delivery">Cash on Delivery</option>
                                <option value="Online">Online Payment</option>
                                <option value="UPI">UPI</option>
                                <option value="Card">Credit/Debit Card</option>
                            </select>
                        </div>

                        <!-- Order Status -->
                        <div class="col-md-6">
                            <label class="form-label">Order Status</label>
                            <select name="order_status" class="form-select" id="order_status">
                                <option value="Processing">Processing</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Out for Delivery">Out for Delivery</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        Update Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
