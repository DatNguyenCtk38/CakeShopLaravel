 
$('#delete_many').click( function() {
    if(confirm("Bạn có chắc muốn xóa những sản phẩm trên"))
    {
     var id = [];

     $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();

    });

   if(id.length === 0) //tell you if the array is empty
   {
    alert("Vui lòng chọn sản phẩm để xóa");
}
else
{

    $.ajax({  
        url:"admin/sanpham/delete",  
        method:"get",  
        data:{product_id:id},  
        success:function(data){
           for(var i=0; i<id.length; i++)
              {
                
               $('tr#row_'+id[i]+'').css('background-color', '#ccc');
               $('tr#row_'+id[i]+'').fadeOut('slow');
              }
            
            id = new Array();
        }  
    }); 

}}
else{
    return false;
}} );



 $('#example').dataTable( 
 {
    "bSort" : false,
    "searching": true,
    " paging": true
} );

 $(document).ready(function(){

   $('#insert_form').on("submit", function(event){  
      event.preventDefault();  
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({  
        url:"admin/sanpham/addProduct",  
        type:"POST",  
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        data:new FormData(this),
        contentType:false,  
        processData:false, 
        success:function(data){
          if ((data.errors)) {
            $('.error').removeClass('hidden');
            $('.error').text(data.errors);
            printErrorMsg(data.errors);
        } else {
           $('.error').remove();
           $('#insert_form')[0].reset();  
           $('#add_data_Modal').modal('hide');  
           $('#list_product').html(data.html); 
       }  

   }  

}); 

  }  
  )});
 function printErrorMsg (msg) {
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  $.each( msg, function( key, value ) {
    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
});
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-img").change(function(){
    readURL(this);
});
$(document).on('click', '.add-modal', function() {
     $(".print-error-msg").hide();
     $('#profile-img-tag').attr('src', null);
    $('#add_data_Modal').modal('show');
});

$(document).on('click', '.edit-modal', function() {
 var product_id = $(this).attr("id");

 $.ajax({  
    url:"admin/sanpham/sua-san-pham/"+product_id+"",  
    method:"GET",  
    data:{product_id:product_id},  
    dataType:"json",  
    success:function(data){
       $(".print-error-msg").hide();
       $('#edit_form')[0].reset();  
       $('#name').val(data.sanPham.name);  
       $('#description').val(data.sanPham.description);  
       $('#unit_price').val(data.sanPham.unit_price);  
       $('#promotion_price').val(data.sanPham.promotion_price);  
       $('#unit').val(data.sanPham.unit);
       if (data.sanPham.new == 1) {
          $('#hot').attr("checked",true);
          $('#no').attr("checked",false);
      }
      else{
          $('#no').attr("checked",true);
          $('#hot').attr("checked",false);

      }
      var src = "public/source/images/stories/virtuemart/product/"+data.sanPham.image;
      $('#profile-img-tag-edit').attr('src', src);
      $('#id_product').val(data.sanPham.id);
      var x = document.getElementById("nhom");
      var size = $('#nhom option').size(); 
      var i;
      for (i = 1; i < size; i++) {
        if(x.options[i].value == data.sanPham.id_type){
         $("#nhom option[value="+x.options[i].value+"]").attr('selected', "selected");
     }
 }
 $('#edit_data_Modal').modal('show');

}  
});  
});


$(document).ready(function(){
    $('#edit_form').on("submit", function(event){  
        event.preventDefault(); 
        var CSRF_TOKEN = $('meta[name="edit-token"]').attr('content');
        $.ajax({  
            url:"admin/sanpham/editProduct",  
            method:"POST",  
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            data:new FormData(this),
            contentType:false,  
            processData:false, 
            success:function(data){
              if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors);
                printErrorMsg(data.errors);
            } else {
               $('.error').remove();
               $('#edit_form')[0].reset();  
               $('#edit_data_Modal').modal('hide');  
               $('#list_product').html(data); 
           }  

       }  

   });  

    })});

function readURLEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag-edit').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-img-edit").change(function(){
    readURLEdit(this);
});
