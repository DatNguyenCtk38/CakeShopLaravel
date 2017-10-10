<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Thêm sản phẩm</h4>
  </div>
  <div class="modal-body">
    <form method="POST" id="insert_form" enctype="multipart/form-data">
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
     
      <label>Tên sản phẩm</label>
      <input class="form-control" required name="name" placeholder="Nhập tên danh mục">
      <label>Mô tả:</label>
      <textarea class="form-control" rows="2" required name="description" placeholder="Mô tả"></textarea>
      <label>Ảnh sản phẩm </label>
      <input type="file" class="form-control" id="profile-img" name="image" />
      <img src="" id="profile-img-tag" width="200px" />
      <br>
      <label for="input-id">Chọn danh mục</label>
      <select name="id_type" id="inputSltCate" required class="form-control">
        <option value="">--Chọn thương hiệu--</option>
        @foreach($nhomsp as $nhom)
        <option value="{{ $nhom->id }}" >{{ $nhom->catename }}</option>  
        @endforeach 
      </select>
      <label>Giá</label>
      <input type="number" required class="form-control" name="unit_price" placeholder="Giá">
      <label>Giá KM</label>
      <input type="number" required class="form-control" name="promotion_price" placeholder="Giá khuyến mãi">
      <label>Đơn vị</label>
      <input class="form-control" required name="unit" placeholder="Đơn vị">
      <label>Nổi bật</label>
      <label class="radio-inline">
        <input name="news" value="1" type="radio">Có
      </label>
      <label class="radio-inline">
        <input name="news" value="0" checked type="radio">Không
      </label>
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