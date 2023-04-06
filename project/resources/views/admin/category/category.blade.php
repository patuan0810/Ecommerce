@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý danh mục','key'=>'list'])
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
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
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
                <h4 class="modal-title">Thêm danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="addform" onsubmit="return false">
                  
                   @csrf
             
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input id="validationServerUsername" type="text" class="form-control" name="category_name" placeholder="Hãy nhập tên Sản phẩm" aria-describedby="inputGroupPrepend3" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_status" >
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                  
                    <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" id="btn_submit_create">Lưu</button>
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
                <h4 class="modal-title">Sửa danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="editform">
                    {{(csrf_field())}}
                    <input type="hidden" name="category_id" id="edit_id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" name="category_name" id="name_edit" value="" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>
                        <select class="custom-select mr-sm-2" id="status_edit" name="category_status" >
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button onclick="event.preventDefault()"  type="button" class="btn btn-primary" id="btn_submit_update" CausesValidation=false>Lưu</button>
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
    function handlegetCategory($id){      
        var getApi ='http://127.0.0.1:8000/api/category/show/'+$id  
        // console.log(getApi);  
        fetch(getApi)
        .then(function(response){
            return response.json();
        })
        .then(function(posts){        
           var htmls= posts.data.map(index => {
           var set_select ="";
           if(index.category_name==0)
           {
            set_select="Hiển thị";
           }
           else{
            set_select="Ẩn";
           }
            document.getElementById('edit_id').value = index.category_id;  
             document.getElementById('name_edit').value = index.category_name;        
            $('select[name="category_status"]').val(index.category_status); 
        });           
        });               
    }
</script>

<script>   
//datatable render
$(document).ready(function () {
   $('#example').DataTable({
        processing: true,   
        ajax: 'http://127.0.0.1:8000/api/category/',       
        columns: [
            { data: 'category_id' },
            { data: 'category_name' },
            // { data: 'category_status' },
            { data: null, 
            render: function(data,type){
                if(data.category_status =='0')
               return  `Hiển thị`
               else 
               return `Ẩn`
            },
            },
            { data: null, 
            render: function(data,type,row){
               return  `<button onclick="handlegetCategory(${row.category_id})"  data-id="${row.category_id}"  class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-1"><i class="fa fa-edit"></i>Sửa</button> 
               <button  data-id="${row.category_id}"class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button>  `
            },            
            },

        ],
    });
  
});

//create here
$(document).ready(function(){
    $(document).on('click','#btn_submit_create',function(event){     
        if (document.querySelector("#addform").checkValidity()) {    
      $.ajax({
        url: "http://127.0.0.1:8000/api/category/create",
        type:"post",
        dataType:"json",
        data: $('#addform').serialize(),
        success: function(response){  
          alert('Them thanh cong');
          $('#example').DataTable().ajax.reload();
          $('#modal_add').modal('hide');     
        }
      });
        }
    });
    false;
  });

//edit here
$(document).ready(function(){
    $('#btn_submit_update').click(function(e){
      e.preventDefault();
      $.ajax({
        url: "http://127.0.0.1:8000/api/category/update",
        type:"post",
        dataType:"json",
        data: $('#editform').serialize(),
        success: function(response){                  
            alert('Sửa thành công');
            $('#example').DataTable().ajax.reload();
            $('#modal_edit').modal('hide');
                     
        }
      });
    });
  });

//delele here
$(document).on('click','#btn_delete',function(){
    if(confirm('Are you sure about that?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/category/delete",
        type:"post",
        dataType:"json",
        data: {
            'id':$(this).data('id'),
        },
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