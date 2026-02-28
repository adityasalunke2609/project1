 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-primary shadow-sm rounded">

            <form action="/admin/subcategory/edit" method="post" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="subcategory_id" id="editSubCategoryId">
                 <div class="modal-body">

                     <div class="mb-3">
                         <label class="form-label">Category</label>
                         <select class="form-select" name="categoryName" id="editCategoryId">
                             @foreach ($category as $data)
                                 <option value="{{ $data->category_id }}">
                                     {{ $data->category_name }}
                                 </option>
                             @endforeach
                         </select>
                     </div>

                     <div class="mb-3">
                         <label class="form-label">Sub Category Name</label>
                         <input type="text" class="form-control" id="editSubCategoryName" name="SubCategoryName"
                             placeholder="Sub Category Name">
                     </div>

                     <div class="mb-3">
                         <label class="form-label">Sub Category Image</label>
                         <input type="file" class="form-control" name="SubCategoryImage" id="editSubCategoryImage">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success">Save</button>
                 </div>
         </div>
         </form>

     </div>
 </div>
 </div>
