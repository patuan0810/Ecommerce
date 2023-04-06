@extends('layout')
@section('title','Trang Chủ - DTK')
@section('content')



<!--features_items-->
<div class="features_items">
	<h2 class="title text-center">sản phẩm mới nhất</h2>
	@foreach($all_product as $product)
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
					<li><a href="{{URL::to('/chi-tiet-san-pham/'.$product['product_id'])}}"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
					<li><a href="{{URL::to('/chi-tiet-san-pham/'.$product['product_id'])}}">Mua Ngay</a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!--features_items-->


<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach($canon_name as $key => $cat)
				<li class="active"><a href="#tshirt" data-toggle="tab">{{$cat['category_name']}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			@foreach($canon as $key => $product_canon)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/product/'.$product_canon['product_image'])}}" alt="" />
							<h2>{{number_format($product_canon['product_price']).' VNĐ'}}</h2>
							<p>{{$product_canon['product_name']}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
						</div>			
					</div>
				</div>
			</div>
			@endforeach
		</div>			
	</div>
</div><!--/category-tab-->

<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach($sony_name as $key => $cat)
				<li class="active"><a href="#tshirt" data-toggle="tab">{{$cat['category_name']}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			@foreach($sony as $key => $product_sony)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/product/'.$product_sony['product_image'])}}" alt="" />
							<h2>{{number_format($product_sony['product_price']).' VNĐ'}}</h2>
							<p>{{$product_sony['product_name']}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
						</div>			
					</div>
				</div>
			</div>
			@endforeach
		</div>			
	</div>
</div><!--/category-tab-->
<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach($nikon_name as $key => $cat)
				<li class="active"><a href="#tshirt" data-toggle="tab">{{$cat['category_name']}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			@foreach($nikon as $key => $product_sony)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/product/'.$product_sony['product_image'])}}" alt="" />
							<h2>{{number_format($product_sony['product_price']).' VNĐ'}}</h2>
							<p>{{$product_sony['product_name']}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
						</div>			
					</div>
				</div>
			</div>
			@endforeach
		</div>			
	</div>
</div><!--/category-tab-->


@endsection