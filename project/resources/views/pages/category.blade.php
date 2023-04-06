@extends('layout')
@section('title','Danh mục')
@section('content')
<!--features_items-->
<div class="features_items">
    @foreach($category_b_name as $key => $cate_name)
	<h2 class="title text-center">{{$cate_name['category_name']}}</h2>
    @endforeach
	@foreach($category_by_id as $key => $product)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
                    <img src="{{URL::to('frontend/images/product/'.$product['product_image'])}}" alt="" />
                    <h2>{{number_format($product['product_price']).' VNĐ'}}</h2>
                    <p>{{$product['product_name']}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
				</div>
			    <div class="product-overlay">
					<div class="overlay-content">
						<h2>{{number_format($product['product_price']).' VNĐ'}}</h2>
						<p>{{$product['product_name']}}</p>
						<a href="{{URL::to('/chi-tiet-san-pham/'.$product['product_id'])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
					<li><a href="{{URL::to('/chi-tiet-san-pham/'.$product['product_id'])}}">Mua Ngay</a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!--features_items-->
@endsection