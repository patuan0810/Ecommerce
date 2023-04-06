@extends('layout')
@section('title','Giỏ hàng')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
				  <li class="active">Giỏ Hàng Của Bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$content = Cart::content(); // hien thi tat ca noi dung
					// echo '<pre>';
					// print_r($content);
					// echo '<pre>';
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình Ảnh</td>
							<td class="description">Mổ Tả Sản Phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total">Tổng Tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('frontend/images/product/'.$v_content->options->image)}}" width="70" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Mã Sản Phẩm: {{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-quantity')}}" method="POST">
										{{csrf_field()}}
										<input class="cart_quantity_input" type="number" min="1" max="50" name="cart_quantity" value="{{$v_content->qty}}" style="width: 100px;">
										<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
										<input type="submit" value="Cập Nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$subtotal = $v_content->price * $v_content->qty;
										echo number_format($subtotal). ' VNĐ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::subtotal().' '.'VNĐ'}}</span></li>
							<li>Phí Vận Chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{Cart::subtotal().' '.'VNĐ'}}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Cập Nhật</a> -->
							
							@if (auth()->check())
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh Toán</a>
							@endif
							
							@if (!auth()->check())
								<a class="btn btn-default check_out" href="{{URL::to('/dang-nhap')}}">Thanh Toán</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--do_action -->

    @endsection