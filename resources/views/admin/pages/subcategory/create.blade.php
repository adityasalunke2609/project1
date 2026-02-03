<!-- Button trigger modal -->
<div class="d-flex justify-content-end align-items-center mb-3">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + Add Sub Category
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-primary shadow-sm rounded">

            <div class="modal-header">
                <h5 class="modal-title">Category Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="row text-center">
                    <div class="col-md-6">
                        <p>Select New Category Image</p>
                        <img id="catImg" src="{{ asset('admin/img/profile.jpg') }}" class="mb-2" width="150">
                        <!-- <input type="file" class="form-control"> -->
                    </div>

                    <div class="col-md-6">
                        <p>Select New Banner Image</p>
                        <img id="bannerImg" src="{{ asset('admin/img/profile2.jpg') }}" class="mb-2" width="150">

                        <!-- <input type="file" class="form-control"> -->
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>

        </div>
    </div>
</div>