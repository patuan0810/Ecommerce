@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý sản phẩm','key'=>'list'])
<div class="row">
    <div class="col-md-11 m-auto">
        <a class="btn btn-success float-right m-2" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-plus"></i> Thêm</a>
    </div>
    <div class="col-md-11 m-auto">
    <div class="card">
    <div class="card-body">
                <table id="example" class="table data-table-container">
                    <thead>
                    <tr>
                      <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Tên</th>
                        <th>Hãng</th>
                        <th>Xuất xứ</th>
                        <th>Bảo hành</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    </table>
        </div>
    </div>
        <div id="modal_add" class="modal fade bd-example-modal-lg accent-gray" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"  style="max-width:1000px">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="addform_product" onsubmit="return false">
                   {{(csrf_field())}}
                    <div class="form-group" style="display:flex ;justify-content:space-between;">
                        <div>
                            <label for="exampleInputEmail1">Tên Sản phẩm</label>
                            <div class="input-group">
                                <input id="product_name" type="text" class="form-control" name="product_name" placeholder="Hãy nhập tên Sản phẩm" aria-describedby="inputGroupPrepend3" required="required">
                             </div>
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Hãng</label>
                            <select  class="custom-select mr-sm-2" id="category_id" name="category_id" >
                            @foreach($category_option as $cate_op)
                                <option value="{{$cate_op->category_id}}">{{$cate_op->category_name}}</option>
                            @endforeach   
                            </select>  
                        </div>
                        <div style="width:18% ;">
                            <label for="exampleInputEmail1">Số lượng</label>
<input id="product_quantity" type="number" class="form-control"  min="0" name="product_quantity" required>
                        </div>
                        <div style="width:18% ;">
                            <label for="exampleInputEmail1">Giá</label>
                            <div style="display:flex;">
                                <input id="product_price" type="number" class="form-control" name="product_price" min="0" required>
                                <label style="margin:5px 5px 5px 5px;"> VNĐ</label>
                            </div>
                        </div>
                        <div style="width:15%">
                                <label for="exampleInputEmail1">Bảo hành</label>
                                <div style="display:flex">
                                    <select  class="custom-select mr-sm-2" id="product_guarantee" name="product_guarantee" >
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                    </select>  
                                    <label  style="margin:auto;">Tháng</label>
                                </div>
                        </div>   
                       
                    </div>
                    <div class="form-group" style="display:flex ;justify-content:space-between;">
                    <div>
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <div class="input-group">
                                <input id="product_origin" type="text" class="form-control" name="product_origin"  aria-describedby="inputGroupPrepend3" >
                             </div>
                        </div>  
                    </div>
                    
                    <div class="form-group" style="display:flex; justify-content:space-between;">
                        <div class="form-outline" style="width:45%">
                            <label for=""> Mô tả sản phẩm</label>
                            <textarea class="form-control" id="product_details" rows="10" style=" resize: none;" name="product_details" required></textarea>
                            <label class="form-label" for="textAreaExample" name="name" aria-valuetext="nhập mô tả"></label>
                        </div>
                        <div>
                            <div>
                                <label for="exampleInputEmail1">Đặc điểm nổi bậc</label></label>
                                <div style="justify-items: start;">
                                    <div class="input-group" >
                                        <input id="product_feature_1" type="text" class="form-control" name="product_feature_1" aria-describedby="inputGroupPrepend3">
</div>
                                    <div class="input-group">
                                        <input id="product_feature_2" type="text" class="form-control" name="product_feature_2" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_3" type="text" class="form-control" name="product_feature_3" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_4" type="text" class="form-control" name="product_feature_4" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_5" type="text" class="form-control" name="product_feature_5" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_6" type="text" class="form-control" name="product_feature_6" aria-describedby="inputGroupPrepend3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                                <label for="exampleInputEmail1">Chọn hình</label>
                                <div class="form-group">
                                      <input type="file" class="form-control-file" id="product_image" name="product_image" multiple required accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_1" name="product_image_1" accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_2" name="product_image_2"accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_3" name="product_image_3"accept="image/*">
                                </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="btn_submit_create_product">Lưu</button>
                </div>
                </form>
</div>
        </div>
        </div>

        <!-- Small modal -->
        </div>
        <div id="modal_edit" class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width:1000px">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Sửa danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form id="editform_product" onsubmit="return false">
                   {{(csrf_field())}}
                    <div class="form-group" style="display:flex ;justify-content:space-between;">
                    <input type="hidden" id="product_id_edit">
                        <div>
                            <label for="exampleInputEmail1">Tên Sản phẩm</label>
                            <div class="input-group">
                                <input id="product_name_edit" type="text" class="form-control" name="product_name_edit" placeholder="Hãy nhập tên Sản phẩm" aria-describedby="inputGroupPrepend3" required="required">
                             </div>
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Hãng</label>
                            <select  class="custom-select mr-sm-2" id="category_id_edit" name="category_id_edit" >
                            @foreach($category_option as $cate_op)
                                <option value="{{$cate_op->category_id}}">{{$cate_op->category_name}}</option>
                            @endforeach   
                            </select>  
                        </div>
                        <div style="width:18% ;">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input id="product_quantity_edit" type="number" class="form-control"  min="0" name="product_quantity_edit" required>
                        </div>
                        <div style="width:18% ;">
                            <label for="exampleInputEmail1">Giá</label>
                            <div style="display:flex;">
                                <input id="product_price_edit" type="number" class="form-control" name="product_price_edit" min="0" required>
                                <label style="margin:5px 5px 5px 5px;"> VNĐ</label>
                            </div>
                        </div>
                        <div style="width:15%">
                                <label for="exampleInputEmail1">Bảo hành</label>
                                <div style="display:flex">
<select  class="custom-select mr-sm-2" id="product_guarantee_edit" name="product_guarantee_edit" >
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                    </select>  
                                    <label  style="margin:auto;">Tháng</label>
                                </div>
                        </div>   
                       
                    </div>
                    <div class="form-group" style="display:flex ;justify-content:space-between;">
                    <div>
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <div class="input-group">
                                <input id="product_origin_edit" type="text" class="form-control" name="product_origin_edit"  aria-describedby="inputGroupPrepend3" >
                             </div>
                        </div>  
                    </div>
                    
                    <div class="form-group" style="display:flex; justify-content:space-between;">
                        <div class="form-outline" style="width:45%">
                            <label for=""> Mô tả sản phẩm</label>
                            <textarea class="form-control" id="product_details_edit" rows="10" style=" resize: none;" name="product_details_edit" required></textarea>
                            <label class="form-label" for="textAreaExample" name="name" aria-valuetext="nhập mô tả"></label>
                        </div>
                        <div>
                            <div>
                                <label for="exampleInputEmail1">Đặc điểm nổi bậc</label></label>
                                <div style="justify-items: start;">
                                    <div class="input-group" >
                                        <input id="product_feature_1_edit" type="text" class="form-control" name="product_feature_1_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_2_edit" type="text" class="form-control" name="product_feature_2_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_3_edit" type="text" class="form-control" name="product_feature_3_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
<input id="product_feature_4_edit" type="text" class="form-control" name="product_feature_4_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_5_edit" type="text" class="form-control" name="product_feature_5_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                    <div class="input-group">
                                        <input id="product_feature_6_edit" type="text" class="form-control" name="product_feature_6_edit" aria-describedby="inputGroupPrepend3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                                <label for="exampleInputEmail1">Chọn hình</label>
                                <div class="form-group">
                                      <input type="file" class="form-control-file" id="product_image_edit" name="product_image_edit" multiple required accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_1_edit" name="product_image_edit_1" accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_2_edit" name="product_image_edit_2"accept="image/*">
                                </div>
                                <div class="form-group">
                                     <input type="file" class="form-control-file" id="product_image_3_edit" name="product_image_edit_3"accept="image/*">
                                </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="btn_submit_edit_product">Lưu</button>
                </div>
            </form>
                </form>
                   
                </div>

            </div>
        </div>
        </div>
</div>


@push('scripts')
<script>

</script>
<script>
    //fetch api show in modal edit
    function handlegetProduct($id){     
        
        var getApi ='http://127.0.0.1:8000/api/product/show/'+$id  
        fetch(getApi)
        .then(function(response){
            return response.json();
        })
        .then(function(posts){       
           var htmls= posts.data.map(index => {
document.getElementById('product_id_edit').value = index.product_id;  
            document.getElementById('product_name_edit').value = index.product_name;  
            document.getElementById('product_details_edit').value = index.product_details;  
            document.getElementById('product_origin_edit').value = index.product_origin;  
            document.getElementById('product_price_edit').value = index.product_price;  
            document.getElementById('product_quantity_edit').value = index.product_quantity;  
            document.getElementById('product_feature_1_edit').value = index.product_feature_1;  
            document.getElementById('product_feature_2_edit').value = index.product_feature_2;  
            document.getElementById('product_feature_3_edit').value = index.product_feature_3;  
            document.getElementById('product_feature_4_edit').value = index.product_feature_4;  
            document.getElementById('product_feature_5_edit').value = index.product_feature_5;  
            document.getElementById('product_feature_6_edit').value = index.product_feature_6;  
            $('select[name="product_guarantee_edit"]').val(index.product_guarantee);    
            $('select[name="category_id_edit"]').val(index.category_id);       
        });           
        });               
    }
</script>

<script>  
 
//datatable render
$(document).ready(function () {
    

   $('#example').DataTable({
    "lengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
    
        processing: true,   
        ajax: 'http://127.0.0.1:8000/api/product',      
        columns: [
            { data: 'product_id' },
            { data: null,
            render:function(data,type,row)
            {  
                return `<img src="{{URL::to('frontend/images/product/${data.product_image}')}}" alt="" style="width:100% ;height:100%"/>`;
            }
            },
            { data: 'product_name' },
            { data: 'category_name' },
            { data: 'product_origin' },
            { data: null,
            render:function(data){
                var guarantee =new Intl.NumberFormat().format(data.product_guarantee)+ ' Tháng';
                return guarantee;
            }
            },
            { data: 'product_quantity' },
            { data: null,
            render:function(data){
                var price =new Intl.NumberFormat().format(data.product_price)+ ' VNĐ';
                return price;
            }
            },
            { data: null, 
            render: function(data,type,row){
               return  `<button onclick="handlegetProduct(${data.product_id})"  data-id="${row.product_id}"  class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-1"><i class="fa fa-edit"></i>Sửa</button> 
               <button  data-id="${row.product_id}"   class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button>`
            },            
            },

        ],
    });
  
});
//create here
$(document).ready(function(){

    $(document).on('click','#btn_submit_create_product',function(event){   
        const data =new FormData();  
      
        let product_name= document.getElementById('product_name').value;
        let category_id= document.getElementById('category_id').value;
        let product_details= document.getElementById('product_details').value;
        let product_origin= document.getElementById('product_origin').value;
        let product_quantity= document.getElementById('product_quantity').value;
        let product_guarantee= document.getElementById('product_guarantee').value;
        let product_price= document.getElementById('product_price').value;
        let product_image= document.getElementById('product_image').value;
        let product_image_1= document.getElementById('product_image_1').value;
        let product_image_2= document.getElementById('product_image_2').value;
        let product_image_3= document.getElementById('product_image_3').value;
        let product_feature_2= document.getElementById('product_feature_2').value;
        let product_feature_3= document.getElementById('product_feature_3').value;
        let product_feature_4= document.getElementById('product_feature_4').value;
        let product_feature_5= document.getElementById('product_feature_5').value;
        let product_feature_6= document.getElementById('product_feature_6').value;
        let product_feature_1= document.getElementById('product_feature_1').value;
     
        data.append("product_name",product_name);
        data.append("product_details",product_details);
        data.append("category_id",category_id);
        data.append("product_price",product_price);
        data.append("product_quantity",product_quantity);
        data.append("product_origin",product_origin);
        data.append("product_guarantee",product_guarantee);
        data.append("product_image",product_image);
        data.append("product_image_1",product_image_1);
        data.append("product_image_2",product_image_2);
        data.append("product_image_3",product_image_3);
        data.append("product_feature_1",product_feature_1);
        data.append("product_feature_2",product_feature_2);
        data.append("product_feature_3",product_feature_3);
        data.append("product_feature_4",product_feature_4);
        data.append("product_feature_5",product_feature_5);
        data.append("product_feature_6",product_feature_6);     
        if (document.querySelector("#addform_product").checkValidity()) {            
            $.ajax({
                url: "http://127.0.0.1:8000/api/product/create",
                type:"post",
                dataType:"json",
                processData: false,
                contentType: false,
                data: data,
                success: function(response){  
                    console.log(response)
                    alert('Them thanh cong');
$('#example').DataTable().ajax.reload();
                    $('#modal_add').modal('hide');     
                    }
                 });
        }
    });
  });
  
//edit here
$(document).ready(function(){
    $(document).on('click','#btn_submit_edit_product',function(event){       
        const data =new FormData();        
        let product_id= document.getElementById('product_id_edit').value;
        let product_name= document.getElementById('product_name_edit').value;
        let category_id= document.getElementById('category_id_edit').value;
        let product_details= document.getElementById('product_details_edit').value;
        let product_origin= document.getElementById('product_origin_edit').value;
        let product_quantity= document.getElementById('product_quantity_edit').value;
        let product_guarantee= document.getElementById('product_guarantee_edit').value;
        let product_price= document.getElementById('product_price_edit').value;
        let product_image= document.getElementById('product_image_edit').value;
        let product_image_1= document.getElementById('product_image_1_edit').value;
        let product_image_2= document.getElementById('product_image_2_edit').value;
        let product_image_3= document.getElementById('product_image_3_edit').value;
        let product_feature_2= document.getElementById('product_feature_2_edit').value;
        let product_feature_3= document.getElementById('product_feature_3_edit').value;
        let product_feature_4= document.getElementById('product_feature_4_edit').value;
        let product_feature_5= document.getElementById('product_feature_5_edit').value;
        let product_feature_6= document.getElementById('product_feature_6_edit').value;
        let product_feature_1= document.getElementById('product_feature_1_edit').value;

        data.append("product_id",product_id);
        data.append("product_name",product_name);
        data.append("product_details",product_details);
        data.append("category_id",category_id);
        data.append("product_price",product_price);
        data.append("product_quantity",product_quantity);
        data.append("product_origin",product_origin);
        data.append("product_guarantee",product_guarantee);
        data.append("product_image",product_image);
        data.append("product_image_1",product_image_1);
        data.append("product_image_2",product_image_2);
        data.append("product_image_3",product_image_3);
        data.append("product_feature_1",product_feature_1);
        data.append("product_feature_2",product_feature_2);
        data.append("product_feature_3",product_feature_3);
        data.append("product_feature_4",product_feature_4);
        data.append("product_feature_5",product_feature_5);
        data.append("product_feature_6",product_feature_6);   
        if (document.querySelector("#editform_product").checkValidity()) {            
            $.ajax({
url: "http://127.0.0.1:8000/api/product/update",
                type:"post",
                dataType:"json",
                processData: false,
                 contentType: false,
                data: data,
                success: function(response){     
                    alert('Sửa thành công');
                    $('#example').DataTable().ajax.reload();
                    $('#modal_edit').modal('hide');     
                    }
                 });
        }
    });
});



//delele here
$(document).on('click','#btn_delete',function(){
    let product_id=$(this).data('id');
    const data = new FormData();
    data.append("product_id",product_id);
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/product/delete",
        type:"post",
        dataType:"json",
        processData: false,
        contentType: false,
        data: data,
        success: function(response){ 
            alert('xoa thanh cong');
            $('#example').DataTable().ajax.reload();
        }
      });
    }

})

</script>
@endpush
@endsection