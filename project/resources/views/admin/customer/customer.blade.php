@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý khách hàng','key'=>'list'])
<div class="row">
    <div class="col-md-11 m-auto">
       
    </div>
    <div class="col-md-11 m-auto">
    <div class="card">
    <div class="card-body">
                <table id="example" class="table data-table-container">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th >Thao tác</th>
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
        ajax: 'http://127.0.0.1:8000/api/customer/',       
        columns: [
            { data: 'customer_id' },
            { data: 'customer_name' },
            { data: 'customer_email' },
            { data: 'customer_phone' },
            { data: 'customer_address' },
            // { data: 'category_status' },
            { data: null, 
            render: function(data,type,row){
               return  `<button  data-id="${row.customer_id}"class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button>`
            },            
            },

        ],
    });
  
});

//delele here
$(document).on('click','#btn_delete',function(){
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/customer/delete",
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