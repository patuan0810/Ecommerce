@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý tài khoản','key'=>'list'])
<div class="row">
    <div class="col-md-11 m-auto">
    </div>
    <div class="col-md-11 m-auto">
    <div class="card">
    <div class="card-body">
                <table id="example" class="table Responsive Hover Table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Phân quyền</th>
                        <th style="width:20% ;">Thao tác</th>
                    </tr>
                    </thead>
                    </table>
        </div>
    </div>




@push('scripts')

<script>   
//datatable render
$(document).ready(function () {
   $('#example').DataTable({
        processing: true,   
        ajax: 'http://127.0.0.1:8000/api/user/',       
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: null, 
            render: function(data,type){
                if(data.is_admin =='0')
               return  `User`
               else 
               return `admin`
            },
            },
            { data: null, 
            render: function(data,type,row){
               return  `<button  data-id="${row.id}"class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button> `
            },            
            },

        ],
    });
  
});

//delele here
$(document).on('click','#btn_delete',function(){
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/user/delete",
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