<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Thêm thể loại</h4>
  </div>
   <form method="POST" id="insert_form" enctype="multipart/form-data">
  <div class="modal-body">
   
     @if(count($errors)>0)
     <div id ="notify" class="alert alert-danger">
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach
    </div>
    @endif
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="alert alert-danger print-error-msg" style="display:none">
      <ul></ul> 
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="form-group">
     
      <label>Tên thể loại</label>
      <input class="form-control" required name="catename" placeholder="Nhập tên danh mục">
    </div>
    
    
    
  </div>
  <div class="modal-footer">
    <button type="submit" name="themdanhmuc" class="btn btn-success"> <span class='glyphicon glyphicon-edit'></span>Thêm </button>
   
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>