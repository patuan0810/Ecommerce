@extends('admin.admin_layout')
@section('admin_content')
@include('admin.partials.cthd',['name'=>'Quản lý đơn hàng','key'=>'list'])
<div class="row">
    <div class="col-md-11 m-auto">
    {{-- <a href="{{url('dashboard/chart')}}" class="btn btn-success float-right m-2" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-chart-bar"></i> Biểu đồ</a> --}}
    </div>
    <div class="col-md-11 m-auto">
    <div class="card">
    <div class="card-body">
                <table id="example" class="table data-table-container">
                    <thead>
                    <tr>
                        <th>Mã Hóa đơn</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th style=>Thao tác</th>
                    </tr>
                    </thead>
                    </table>
        </div>
    </div>
     <!-- Small modal -->
        </div>
        <div id="modal_edit" class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Chi tiết đơn hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                        <div class="row mx-3">
                            <div class="col-xl-12">
                                
                                <div>   
                                <input type="hidden" for="" id="order_id"></input>
                                    <label for="">Địa chỉ :</label>
                                    <input type="text" for="" id="address_details"disabled  style="border-radius: 2px; border:none"></input>
                                </div>
                                <div>
                                    <label for="">Email :</label>
                                    <input type="text" for="" id="email_details"disabled  style="border-radius: 2px;width: 300px ; border:none"></input>
                                </div>
                                <div>
                                    <label for="">Số điện thoại :</label>
                                    <input type="text" for="" id="phone_details"disabled  style="border-radius: 2px; border:none"></input>
                                </div>
                                <div>
                                    <label for="">Ngày tạo :</label>
                                    <input  type="text" for="" id="date_details"disabled  style="border-radius: 2px; border:none"></input>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row mx-3 col-xl-12">
                            <form action="" id="edit_form">
                            <table id="table" class="table">
                            <thead>
                                <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                </tr>
                            </thead>
                            
                            <tbody id="order_details">

                            </tbody>
                            </table>
                            </form>
                        </div>
                        <hr>
                        <div class="rowmx-3" style="display:flex ;justify-content:space-between">
                            <p class="float-start" style="font-size: 18px; color: red; float:left">Tổng tiền </p>
                            <input id="total_details" for="" style="border-radius: 2px; border:none;text-align:center ;float:right" disabled ></input>
                        </div>
                       

             </div>
    </div>
</div>
                </div>
                <div class="modal-footer justify-content-between">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn_submit_update" CausesValidation=false>Xác nhận đơn hàng</button>
                </div>
            </div>
        </div>
        </div>
</div>


@push('scripts')
<script>
    function handlegetOrder($id){    
        
        var getApi ='http://127.0.0.1:8000/api/order/details/'  
        // console.log(getApi);  
        fetch(getApi)
        .then(function(response){
            return response.json();     
        })
        .then(function(posts){        
            var htmls= posts.data.map(a => {
            if(a.order_id==$id){
                
                var date=new Date(a.created_at);
                var create_at =date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear();
                var price =new Intl.NumberFormat().format(a.product_price)  
                document.getElementById('order_id').value = a.order_id;  
                document.getElementById('address_details').value = a.shipping_address;  
                document.getElementById('email_details').value = a.shipping_email;  
                document.getElementById('phone_details').value = a.shipping_phone;  
                document.getElementById('date_details').value = create_at; 
                document.getElementById('total_details').value = a.order_total+' VNĐ'; 
               
                return `
                <tr>
                        <td>${a.product_name}<input type="hidden" for="" id="product_${a.product_id}" value="${a.product_id}"></input></td>
                        <td >${a.product_sales_quantity}<input type="hidden" for="" id="quantily_product" value="${a.product_sales_quantity}"></td>
                        <td>${price} VNĐ</td>
                    </tr>`

            }  
        });
        var html = htmls.join('');
        document.getElementById('order_details').innerHTML= html;  
        });               
    }
</script>


<script>

//datatable render
$(document).ready(function () {
   $('#example').DataTable({
    "lengthMenu": [[ 5, 10, -1], [ 5, 10, "All"]],
        processing: true,   
        ajax: 'http://127.0.0.1:8000/api/order/',       
        columns: [
            { data: 'order_id' },
            { data: 'shipping_name' },
            { data: 'shipping_email' },
            { data: 'shipping_address' },
            { data: 'shipping_phone' },
            { data: null, 
            render: function(data,type,row){
               date=new Date(data.created_at);
               return date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear();
            },          },
            // { data: 'category_status' },
            { data: 'order_status'},
            { data: null, 
            render: function(data,type,row){
               return  `<button onclick="handlegetOrder(${data.order_id})"  id="details_btn" data-id="${data.order_id}"  class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-1"><i class="fa fa-edit"></i>Chi tiết</button> 
               <button  data-id="${data.order_id}"class="btn btn-danger" id="btn_delete"><i class="fa fa-trash"></i> Xóa</button>  `
            },            
            },

        ],
    });
  
});


//edit here
$(document).ready(function(){
    $('#btn_submit_update').click(function(e){
        const data= new FormData(document.querySelector('#edit_form'))
        
        var id= document.getElementById('order_id').value;
      
      data.append('id',id);
//       for (const value of data.values()) {
//   console.log(value);
// }
      $.ajax({
        url: "http://127.0.0.1:8000/api/order/update",
        type:"post",
        dataType:"json",
        processData: false,
        contentType: false,
        data: data,
        success: function(response){                  
            $('#example').DataTable().ajax.reload();
            $('#modal_edit').modal('hide');
                     
        }
      });
    });
  });

//delele here
$(document).on('click','#btn_delete',function(){
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
        url: "http://127.0.0.1:8000/api/order/delete",
        type:"post",
        dataType:"json",
        data: {
            'id':$(this).data('id'),
        },
        success: function(response){
            console.log(response); 
            alert('xoa thanh cong');
            $('#example').DataTable().ajax.reload();
        }
      });
    }
})

</script>
@endpush
@endsection