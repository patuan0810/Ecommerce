@extends('layout')
@section('title','Trang sản phẩm')
@section('content')
{{-- filter --}}
<div class="row">
	<div class="col-md-4">
		<label for="amount">Sắp xếp theo</label> 
		<form> 
			@csrf
			<select name="sort" id = "sort"class="form-control" >	
				<option value="{{Request::url()}}?sort_by=none">-- Lọc --</a></option>
				<option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
				<option value="{{Request::url()}}?sort_by=giam_dan ">Giá giảm dần</option>
				<option value="{{Request::url()}}?sort_by=kytu_az ">Lọc theo tên A đến Z</option>
				<option value="{{Request::url()}}?sort_by=kytu_za ">Lọc theo tên Z đến A</option>
			</select>
		</form>
	</div>
	<div class="col-md-4">
		<label for="amount">Sắp xếp theo giá</label> 
		<form> 
			@csrf
			<select name="sort_price" id = "sort_price"class="form-control" >	
				<option value="{{Request::url()}}?sort_by=none">Khoảng giá</a></option>
				<option value="{{Request::url()}}?sort_by=<15m"> < 15.000.000 VNĐ</option>
				<option value="{{Request::url()}}?sort_by=15m-30m ">15.000.000 VNĐ - 30.000.000 VNĐ</option>
				<option value="{{Request::url()}}?sort_by=30m-45m ">30.000.000 VNĐ - 45.000.000 VNĐ</option>
				<option value="{{Request::url()}}?sort_by=>45m "> > 45.000.000 VNĐ</option>
			</select>
		</form>
	</div>
</div>


<!--features_items-->
<div class="features_items" style="margin-top:20px">
	<h2 class="title text-center">Tất cả sản phẩm</h2>
	@foreach($all_product as $product)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
                    <img src="{{URL::to('frontend/images/product/'.$product['product_image'])}}" height="300px" alt="" />
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

{{-- <div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach($canon_name as $key => $cat)
				<li class="active"><a href="#tshirt" data-toggle="tab">{{$cat->category_name}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			@foreach($canon as $key => $product_nike)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/product/'.$product_nike->product_image)}}" alt="" />
							<h2>{{number_format($product_nike->product_price).' VNĐ'}}</h2>
							<p>{{$product_nike->product_name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
						</div>			
					</div>
				</div>
			</div>
			@endforeach
		</div>			
	</div>
</div><!--/category-tab-->--}}

	<nav aria-label="Page navigation example">
		<ul class="pagination">
			{!! $all_product->links() !!}
		</ul>
	  </nav>

	  
@endsection
