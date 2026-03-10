<div class="modal fade" id="editOrderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-sm">

            <!-- Modal Header -->
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-semibold text-dark">Edit Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="/admin/order/edit" method="post">
                @csrf
                <input type="hidden" name="order_master_id" id="order_master_id">

                <div class="modal-body">

                    <div class="row">

                        <!-- Order Date -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Order Date</label>
                            <input type="text" name="order_date" id="order_date" class="form-control bg-light"
                                readonly>
                        </div>

                        <!-- Customer Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Customer Name</label>
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="text" id="customer_name" name="customer_name" class="form-control bg-light"
                                readonly>
                        </div>

                        <!-- Total Amount -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control bg-light"
                                readonly>
                        </div>

                        <!-- Payment Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Payment Status</label>
                            <select name="payment_status" class="form-select" id="payment_status">
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Failed">Failed</option>
                                <option value="Refunded">Refunded</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Payment Method</label>
                            <select name="payment_mode" class="form-select" id="payment_mode">
                                <option value="cash on delivery">Cash on Delivery (COD)</option>
                                <option value="Online">Online Payment</option>
                                <option value="UPI">UPI Payment</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Wallet">Wallet</option>
                            </select>
                        </div>

                        <!-- Order Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Order Status</label>
                            <select name="order_status" class="form-select" id="order_status">
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Processing">Processing</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Out for Delivery">Out for Delivery</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Returned">Returned</option>
                            </select>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update Order
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>