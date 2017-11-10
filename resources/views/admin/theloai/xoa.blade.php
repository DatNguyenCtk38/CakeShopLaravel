<div id="delete_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Xóa</h4>
  </div>
  <form method="post" id="delete_form" enctype="multipart/form-data">
      <input class="form-control"  type="hidden" id="id_product_delete" name="id_product">
  <div class="modal-body">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    Bạn có chắc chắn muốn xóa nhom <span id="product_name"></span>
    <meta name="delete-token" content="{{ csrf_token() }}" />
  </div>
  <div class="modal-footer">
    <button type="submit"  class="btn btn-danger delete"> <span class="glyphicon glyphicon-trash"></span> Xóa </button>
   
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>