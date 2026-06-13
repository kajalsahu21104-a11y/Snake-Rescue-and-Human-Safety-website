<?php

echo '

<div class="row">
  <div class="col-md-4">
    <div class="bg-white p-2 shadow-sm">
      <h4>Create Category <i id="createLoadingIcon" class="fa fa-circle-o-notch fa-spin d-none " style="float:right;"></i> </h4>
    <hr/>
    <form  id="category_form">
      <input placeholder="Mobile" class="form-control border-0 category_input"/>
      <div class="mt-2 category_fields_area">

      </div>
      <div class="mt-2">
        <button  type="button" class="btn btn-danger rounded-0" id="add_field_btn"> <i class="fa fa-plus"></i> Add Fields </button>
          <button  type="submit" class="btn btn-primary rounded-0" id="createCatBtn">Create </button>

      </div>
    </form>
    </div>
  </div>
  <div class="col-md-2">

  </div>
  <div class="col-md-6">
    <div class="p-2 bg-white">
      <h4 class="text-center">Create List  </h4>
      <hr/>
      <table class=" table table-bordered text-center" id="tableList">
      <tr>
      <th> Category Name</th>
      <th> Create Date</th>
      <th> Action</th>
      </tr>
      </table>
      <div class="d-flex justify-content-center d-none" id="catgorylistLoader">
      <div class="loader"></div>
      </div>
      <div class="d-flex justify-content-between">
      <button id="prev"> <i class="fa fa-chevron-left"></i> </button>
      <button id="next" next-page="1"> <i class="fa fa-chevron-right"></i> </button>
       </div>
    </div>

  </div>
  <div class="col-12 text-center mt-3">
    <div class=" rounded-0 alert d-none" id="Create_categoryAlert">

    <div>
  </div>
</div>


<div class="modal" tabindex="-1" id="confirmModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <b>Are You Sure ?</b><br/>
        <b id="category_notification_msg"></b>
      </div>
      <div class="modal-footer">
      <button class="btn btn-danger rounded-0" id="deleteYesBtn">Yes</button>
      <button class="btn btn-success rounded-0" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<div class="toast  animate__animated animate__slideInRight" style="position:fixed;right:10px;top:10px;" id="delete_Category_msg">
  <div class="toast-header bg-success text-white">
    <strong class="me-auto">Category Notification</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
  </div>
  <div class="toast-body">
    <p id="delete_cate_innlineMessage"></p>
  </div>
</div>
</div>


<!--Edit Modal --!>

<div class="modal" id="cat_EditModal">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-body">
      <b class="text-center mb-2">Edit Category</b><br/>

      <input id="cate_editInput" class="form-control mb-2"/>
      <button class="btn btn-warning " id="edit_catBtn"> Save Changes</button>
      <button class="btn btn-primary" data-bs-dismiss="modal" id="cancelBtn"> Cancel</button>
    </div>
  <div>
  </div>
</div>



<!-- Edit Modal End--!>


';

 ?>
