@extends('layout')
@section('title','Thanh Toán')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
				  <li class="active">Thanh Toán</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng!</p>
			</div>
			<!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Nhập thông tin mua hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/shipping')}}" method = "POST">
									{{ csrf_field()}}
									<input name="shipping_email" placeholder="Email*">
									<input name="shipping_name" placeholder="Họ và tên">
									<input name="shipping_address" placeholder="Địa chỉ">
									<input name="shipping_phone" placeholder="Điện thoại">
									<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn!" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->
@endsection