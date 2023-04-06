@extends('layout_1')
@section('content-1')
<!--features_items-->
<style>
	.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
	}

	.card {
		position: relative;
		display: flex;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 0 solid rgba(0,0,0,.125);
		border-radius: .25rem;
	}

	.card-body {
		flex: 1 1 auto;
		min-height: 1px;
		padding: 1rem;
	}

	.gutters-sm {
		margin-right: -8px;
		margin-left: -8px;
	}

	.gutters-sm>.col, .gutters-sm>[class*=col-] {
		padding-right: 8px;
		padding-left: 8px;
	}
	.mb-3, .my-3 {
		margin-bottom: 1rem!important;
	}

	.bg-gray-300 {
		background-color: #e2e8f0;
	}
	.h-100 {
		height: 100%!important;
	}
	.shadow-none {
		box-shadow: none!important;
	}
</style>
<div class="container">
    <div class="main-body">
    <!-- Breadcrumb -->
	<nav aria-label="breadcrumb" class="main-breadcrumb">
		<ol class="breadcrumb">
		  <h3 style="text-align: center"> Thông tin cá nhân</h1>
		</ol>
	  </nav>
	  <!-- /Breadcrumb -->
          <div class="row gutters-sm">
           @foreach($customer as $cus)
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('frontend/images/avatar7.png')}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{Auth::user()->name}}</h4>
                      <p class="text-secondary mb-1">Khách hàng</p>
                      <p class="text-muted font-size-sm">{{$cus->customer_address}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href="{{URL::to('/tai-khoan')}}"> Thông tin cá nhân</a> 
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href="{{URL::to('/tinh-trang')}}"> Tình trạng đơn hàng</a> 
                  </li>
                </ul>
              </div>
            </div>
          @endforeach
            <div class="col-md-8">
            @foreach($order_1 as $cus)
              <div class="card mb-3">
                <div class="card-body">
                  
                  <form  id="edit_form">
                    <div class="row">
                    <div class="col-sm-3">
                          <h6 class="mb-0">Tình trạng đơn hàng</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <b style="color: green">{{$cus->order_status}}</b>
                        </div>
                      
                      </div>
                       <hr> 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Địa chỉ:</h6>
                    </div>
                             
                    <input type="hidden" name="customer_id" id="customer_id" value="{{Auth::user()->id}}"> 

                    <div class="col-sm-9 text-secondary">
                     <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_name" id="customer_name" value="{{$cus->shipping_address}}"disabled> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     
                      <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_email" id="customer_email" value=" {{$cus->shipping_email}}" disabled> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Số Điện thoại</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_phone" id="customer_phone" value="{{$cus->shipping_phone}}"disabled>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ngày tạo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_address" id="customer_address" value="{{$cus->created_at}}"disabled>
                    </div>
                  
                  </div>
                   <hr> 
                   
                   <div class="row">
                    <table id="example" class="table data-table-container">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                    {{-- <div style="display:flex">
                    <div class="col-sm-9 text-secondary">
                        <h6>Tên sản phẩm</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <h6>Số lượng</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <h6>Giá </h6>
                      </div>
                    </div> --}}
                    @foreach($order as $cus)
                        <tr>
                            <th>{{$cus->product_name}}</th>
                            <th>{{$cus->product_sales_quantity}}</th>
                            <th>{{number_format($cus->product_price).' VNĐ'}}</th>
                            
                        </tr>
                    </tbody>
                    @endforeach
                    
                </table>
            
                   <hr> 
                   <div class="row">
                    <div class="col-sm-8" >
                      <h6 class="mb-0"  style="padding-left: 10px"><b> Tổng tiền</b></h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <b style="color: red">{{number_format($cus->order_total).' VNĐ'}}</b>
                    </div>
                  
                  </div>
                   <hr> 
                  </form>
                
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
    </div>

    <script>
window.onload = function(){
$(document).ready(function(){
    $('#btn_edit').click(function(e){
      e.preventDefault();
      $.ajax({
        url: "http://127.0.0.1:8000/api/customer/update",
        type:"post",
        dataType:"json",
        data: $('#edit_form').serialize(),
        success: function(response){             
            alert('Sửa thành công');      
            location.reload(); 
        }
      });
    });
  });}
    </script>
@endsection