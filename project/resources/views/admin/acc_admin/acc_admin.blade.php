@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý Admin','key'=>'list'])
<div class="row">
    <div class="col-md-11 m-auto">
        <a class="btn btn-success float-right m-2" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fas fa-plus"></i> Thêm</a>
    </div>
    <div class="col-md-11 m-auto">
    <div class="card">
    <div class="card-body">
                <table id="example" class="table Responsive Hover Table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th style="width:20% ;">Thao tác</th>
                    </tr>
                    </thead>
                    </table>
        </div>
    </div>


        <div id="modal_add" class="modal fade bd-example-modal-lg accent-gray" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"  >
        <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Thêm Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="add_form" onsubmit="return false">
                        {{(csrf_field())}}
                        <input type="hidden" name="category_id" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="" required="required" >
                        
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="" required="required" >
                       
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" value="" required="required" >
                       
                            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="c_password" id="c_password" value="" required="required" >
                       
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="" required="required" >
                      
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="" required="required" >
                        </div>
                        <div class="modal-footer justify-content-between">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button  type="submit" class="btn btn-primary" id="btn_submit_create" CausesValidation=false>Lưu</button>
                </div>
                    </form>
                </div>
             
            </div>
        </div>
        </div>

        <!-- Small modal -->
        </div>
        <div id="modal_edit" class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Sửa tài khoản Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="edit_form" onsubmit="return false">
                        {{(csrf_field())}}
                  
                        
                            <input type="hidden" name="id_acc_edit" id="edit_id">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="text" class="form-control" name="name_edit" id="name_edit" value="" required="required"  >
                        
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email_edit" id="email_edit" value=""  readonly>
                       
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" class="form-control" name="password_edit" id="password_edit" value="" required="required" >
                       
                            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="c_password_edit" id="c_password_edit" value="" required="required" >
                       
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone_edit" id="phone_edit" value="" required="required" >
                      
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address_edit" id="address_edit" value="" required="required" >
                        
                        <div class="modal-footer justify-content-between">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button   type="submit" class="btn btn-primary" id="btn_submit_update" >Lưu</button>
                </div>
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
    function handlegetacc($id){      
        // console.log($id)
        var getApi ='http://127.0.0.1:8000/api/acc_admin/show/'+$id  
        // console.log(getApi);  
        fetch(getApi)
        .then(function(response){
            return response.json();
        })
        .then(function(posts){
   
            document.getElementById('edit_id').value = posts.data.admin_id
             document.getElementById('name_edit').value = posts.data.name;  
             document.getElementById('email_edit').value = posts.data.email;   
             document.getElementById('phone_edit').value = posts.data.admin_phone;  
             document.getElementById('address_edit').value = posts.data.admin_address;     
            });                   
                      
    }
</script>

<script>   
//datatable render
$(document).ready(function () {
   $('#example').DataTable({
        processing: true,   
        ajax: 'http://127.0.0.1:8000/api/acc_admin/',       
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'admin_email' },
            { data: 'admin_phone' },
            { data: 'admin_address' },
            { data: null, 
            render: function(data,type,row){
               return  `<button onclick="handlegetacc(${row.id})"  data-id="${row.id}"  class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-1"><i class="fa fa-edit"></i>Sửa</button> 
               <button  data-id="${row.id}"class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button>  `
            },            
            },

        ],
    });
  
});

//create here
$(document).ready(function(){
    $(document).on('click','#btn_submit_create',function(event){     
        if (document.querySelector("#add_form").checkValidity()) {    
        var firstpassword=document.getElementById('password').value;  
        var secondpassword=document.getElementById('c_password').value; 
        if(firstpassword==secondpassword){  
        $.ajax({
            url: "http://127.0.0.1:8000/api/create_acc",
            type:"post",
            dataType:"json",
            data: $('#add_form').serialize(),
            success: function(response){  
            alert('Them thanh cong');
            $('#example').DataTable().ajax.reload();
            $('#modal_add').modal('hide');     
            }
        });
    }
    else{  
alert("Mật khẩu phải trùng khớp!");  
return false;  
}  
        }
    });
    
    false;
  });

//edit here
$(document).ready(function(){
    $(document).on('click','#btn_submit_update',function(event){     
        if (document.querySelector("#edit_form").checkValidity()){      
        var firstpassword=document.getElementById('password_edit').value;  
        var secondpassword=document.getElementById('c_password_edit').value; 
      if(firstpassword==secondpassword){  
        $.ajax({
        url: "http://127.0.0.1:8000/api/update_acc",
        type:"post",
        dataType:"json",
        data: $('#edit_form').serialize(),
        success: function(response){    
            console.log(response)              
            alert('Sửa thành công');
            $('#example').DataTable().ajax.reload();
            $('#modal_edit').modal('hide');  
        }
      });
}  
else{  
alert("Mật khẩu phải trùng khớp!");  
return false;  
}  
    }
    });
  });

//delele here
$(document).on('click','#btn_delete',function(){
    if(confirm('Are you sure about that?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/delete_acc",
        type:"post",
        dataType:"json",
        data: {
            'id':$(this).data('id'),
        },
        success: function(response){ 
            console.log(response)
            alert('xoa thanh cong');
            $('#example').DataTable().ajax.reload();
        }
      });
    }
})

</script>
@endpush
@endsection