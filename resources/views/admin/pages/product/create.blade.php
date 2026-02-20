<!-- Button -->
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Product
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalXlLabel">Add Product</h1><button type="button"
                    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="background-color:rgb(168, 221, 221)">
                    <div class="card-body">
                        <button type="button" class="btn btn-light">Primary Information</button>
                        <button type="button" class="btn btn-light">Ecommerce</button>

                    </div>
                </div>

                <form action="/admin/product" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mx-2" style="border:1px solid green">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" id="productName" name="productName" placeholder="Product Name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hsn">HSN Code</label>
                                <input type="text" id="hsn" name="productHSNcode" placeholder="HSN Code"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="productWeight">Product Weight</label>
                                <input type="text" id="productWeight" name="productWeight"
                                    placeholder="Product Weight" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="productCategoryName">Category</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="productCategoryName">

                                    @foreach ($category as $data)
                                        <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="subCategoryId">Sub Category</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="productSubCategoryName">
                                    @foreach ($subcategory as $data)
                                        <option value="{{ $data->subcategory_id }}">{{ $data->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="tax">Tax %</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="productTax">
                                    @foreach ($tax as $data)
                                        <option value="{{ $data->tax_id }}">{{ $data->tax_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="unitId">Unit</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="productUnit">
                                    @foreach ($unit as $data)
                                        <option value="{{ $data->unit_id }}">{{ $data->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body" style="background-color:rgb(168, 221, 221)">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>QR Code</th>
                                        <th>Unique Code</th>
                                        <th>MRP</th>
                                        <th>Sale</th>
                                        <th>Purchase</th>
                                        <th>Wholesale</th>
                                        <th>Distributor</th>
                                        <th>OP Qty</th>
                                        <th>OP Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-control" name="barcode"></td>
                                        <td><input class="form-control" name="qrcode"></td>
                                        <td><input class="form-control" name="unique_code"></td>
                                        <td><input class="form-control" name="mrp" type="number"></td>
                                        <td><input class="form-control" name="sale_price" type="number">
                                        </td>
                                        <td><input class="form-control" name="purchase_price" type="number">
                                        </td>
                                        <td><input class="form-control" name="wholesale_price" type="number"></td>
                                        <td><input class="form-control" name="distributor_price" type="number"></td>
                                        <td><input class="form-control" name="opening_qty" type="number">
                                        </td>
                                        <td><input class="form-control" name="opening_value" type="number">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
                                    <input type="file" id="productImage" name="productImage"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
