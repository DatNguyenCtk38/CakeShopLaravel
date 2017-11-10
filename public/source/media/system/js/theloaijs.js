 
$('#delete_many').click( function() {
if(confirm("Bạn có chắc muốn xóa những nhóm sản phẩm trên"))
{
 var id = [];

 $(':checkbox:checked').each(function(i){
  id[i] = $(this).val();

});

   if(id.length === 0) //tell you if the array is empty
   {
    alert("Vui lòng chọn nhóm sản phẩm để xóa");
  }
  else
  {

    $.ajax({  
      url:"admin/theloai/delete",  
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

