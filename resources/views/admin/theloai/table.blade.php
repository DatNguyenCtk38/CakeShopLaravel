 <div id="listcategory">
                    <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên danh mục</th>
                           
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($theloais as $theloai)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$theloai->id}}</td>
                                    <td>{{$theloai->catename}}</td>
                                   

                                    <td class="center">
                                    <button onclick="xoatheloai('{{$theloai->catename}}',{{$theloai->id}})" id="{{$theloai->id}}" value="{{$theloai->catename}}" class="delete-modal btn btn-danger" >
                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                  </button></td>
                                  <td class="center"><button class="edit-modal btn btn-info" id="{{$theloai->id}}" data-id=""
                                    data-name="">
                                    <span class="glyphicon glyphicon-edit"></span> Sửa
                                  </button></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                </div>
                <script type="text/javascript">
                      $("#example").dataTable( 
                    {
                    "bSort" : false,
                    "searching": true,
                    " paging": true
                    } );
                        
                    </script>