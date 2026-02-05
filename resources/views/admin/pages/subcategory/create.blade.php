<!-- Button trigger modal -->
<div class="d-flex justify-content-end align-items-center mb-3">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + Add Sub Category
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-primary shadow-sm rounded">

            <form action="subcategorysave" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Add Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="SubCategoryName">
                    </div>
                </div>

                <div class="row text-center">
                    <div class="">
                        <p>Select New sub Category Image</p>
                        <!-- <img id="catImg" src="{{ asset('admin/img/profile.jpg') }}" class="mb-2" width="150"> -->
                        <input type="file" class="form-control" name="SubCategoryImage">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>

            </form>

        </div>
    </div>
</div>