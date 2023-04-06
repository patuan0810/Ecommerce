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
    @foreach($customer as $cus)
          <div class="row gutters-sm">
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
            <div class="col-md-8">
                  
              <div class="card mb-3">
                <div class="card-body">
                  
                  <form  id="edit_form">
                
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Họ và tên</h6>
                    </div>
                             
                    <input type="hidden" name="customer_id" id="customer_id" value="{{Auth::user()->id}}"> 

                    <div class="col-sm-9 text-secondary">
                     <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_name" id="customer_name" value="{{Auth::user()->name}}"> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     
                      <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_email" id="customer_email" value=" {{Auth::user()->email}}" disabled> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Điện thoại</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_phone" id="customer_phone" value="{{$cus->customer_phone}}">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Địa chỉ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" style="width:300px ;border:none; border-color:#fff" name="customer_address" id="customer_address" value="{{$cus->customer_address}}">
                    </div>
                  
                  </div>
                   <hr> 
                   <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" id="btn_edit" class="btn btn-info " target="__blank" >Chỉnh sửa</button>
                    </div>
                  </div> 
                  
                  </form>
                
                </div>
              </div>

            </div>
          </div>
    @endforeach
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