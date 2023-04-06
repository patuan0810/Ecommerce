<!DOCTYPE html>
<html lang="en">
	
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DTTK - SHOP</title>
	<link rel="icon" type="image/png" href="{{asset('frontend/images/favicon.png')}}"/>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/lightgallery.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/lightslider.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/prettify.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href=" ">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
.filter_size_s{
	padding-left: 0;
    margin: 20px 0 117px 0;
    list-style: none;
}
.filter_size{
	float:left;
	text-align: center;
    padding: 7px 0px 0px 0px;
    width: 45px;
    height: 45px;
    border: #cecece 1px solid;
    margin-bottom: -1px;
    /* margin-right: -5px; */
    font-family: NunitoSanRegular;
    font-size: 20px;
}
</style>
<body>

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
						<li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
						<li><a href="{{URL::to('/chi-tiet-san-pham/'.$product['product_id'])}}">Mua Ngay</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div>
  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
	<script src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('frontend/js/lightslider.js')}}"></script>
	<script src="{{asset('frontend/js/prettify.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		$('#imageGallery').lightSlider({
			gallery:true,	//chay nhieu hinh anh
			item:1,		
			loop:true,	//vong lap click vao 
			thumbItem:3,	// hinh anh hien thi o duoi details
			slideMargin:0,
			enableDrag: false,
			currentPagerPosition:'left',
			onSliderLoad: function(el) {
				el.lightGallery({
					selector: '#imageGallery .lslide'
				});
			}   
		});  
	});
	</script>
	{{-- filter --}}
	<script type="text/javascript">
		 $(document).ready(function(){
			$('#sort').on('change', function(){ // khi gia tri thay doi trong sort 
				var url = $(this).val();	//lấy giá trị url 
				// alert(url);
				if (url){
					window.location = url;		// refesh lại trang với đường dẫn url này
				}
				return false;
			});
		 });
	</script>
</body>
</html>