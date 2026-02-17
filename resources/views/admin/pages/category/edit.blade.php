<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-primary shadow-sm rounded">

            <form action="/admin/category/edit" method="post">
                @csrf
                <input type="hidden" name="category_id" id="editcategoryId">
                <div class="modal-header">
                    <h5 class="modal-title">Category Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="categoryName" id="editCategoryName">
                    </div>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <p>Select New Category Image</p>
                            <input type="file" class="form-control" name="categoryimage" id="editCategoryImage">


                        </div>

                        <div class="col-md-6">
                            <p>Select New Banner Image</p>
                            <input type="file" class="form-control" name="categorybannerimage"
                                id="editCategoryBannerImage">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
