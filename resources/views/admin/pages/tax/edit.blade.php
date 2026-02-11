<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-primary shadow-sm rounded">

            <form action="/admin/tax/edit" method="post">
                @csrf
                <input type="hidden" name="tax_id" id="editTaxId">

                <div class="modal-header">
                    <h5 class="modal-title">Tex Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tax Name</label>
                        <input type="text" class="form-control" name="taxName" id="editTaxName">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tax percentage</label>
                        <input type="text" class="form-control" name="taxPercentage" id="editTaxPercentege">
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
