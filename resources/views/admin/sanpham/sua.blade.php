<div id="edit_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sửa sản phẩm</h4>
  </div>
  <div class="modal-body">
    <form method="POST" id="edit_form" enctype="multipart/form-data">
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
    <meta name="edit-token" content="{{ csrf_token() }}" />
    <div class="form-group">
      <input class="form-control"  type="hidden" id="id_product" name="id_product">
      <label>Tên sản phẩm</label>
      <input class="form-control" required id="name"  name="name" placeholder="Nhập tên danh mục">
      <label>Mô tả:</label>
      <textarea class="form-control" id="description" rows="2" required name="description" placeholder="Mô tả"></textarea>
      <label>Ảnh sản phẩm </label>
      <input type="file" class="form-control" id="profile-img-edit" name="image" />
      <img src="" id="profile-img-tag-edit" width="150px" height="150px" />
      <br>
      <label for="input-id">Chọn danh mục</label>
      <select name="id_type" id="nhom" required class="form-control">
        <option value="">--Chọn thương hiệu--</option>
        @foreach($nhomsp as $nhom)
        <option value="{{ $nhom->id }}" >{{ $nhom->catename }}</option>  
        @endforeach 
      </select>
      <label>Giá</label>
      <input type="number" required id="unit_price" class="form-control" name="unit_price" placeholder="Giá">
      <label>Giá KM</label>
      <input type="number" required id="promotion_price" class="form-control" name="promotion_price" placeholder="Giá khuyến mãi">
      <label>Đơn vị</label>
      <input class="form-control" id="unit" required name="unit" placeholder="Đơn vị">
      <label>Nổi bật</label>
      <label class="radio-inline">
        <input id="hot" name="news" value="1" type="radio">Có
      </label>
      <label class="radio-inline">
        <input id="no" name="news" value="0" checked type="radio">Không
      </label>
    </div>
    
    
    
  </div>
  <div class="modal-footer">
    <button type="submit" name="themdanhmuc" class="btn btn-success edit"> <span class='glyphicon glyphicon-edit'></span>Sửa </button>
   
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>