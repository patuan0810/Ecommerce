<!DOCTYPE html>
<html lang="en">
	
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title')</title>
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

<!-- header -->
	@include('pages.header')
<!-- end header -->
<!-- slider -->
@include('pages.slider')
<!-- end slider -->

<!-- slider -->
{{-- @include('pages.slidebar') --}}
<!-- end slider -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Thương hiệu</h2>
						<div class="brands-name" ><!--category-productsr-->
								<ul class="nav nav-pills nav-stacked">
									@foreach($category_product as $key => $cate)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$cate['category_id'])}}"> {{$cate['category_name']}}</a></li>
									@endforeach
								</ul>
						</div><!--/category-products-->
					
						<!--shipping-->
						<div class="shipping text-center">
							<img src="{{URL::to('frontend/images/slider1.png')}}" alt="" />
						</div> 
						<!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<!--Footer-->
	@include('pages.footer')
	<!--/Footer-->
	
	
  
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
	{{-- filter ajax--}}
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

	<script type="text/javascript">
		$(document).ready(function(){
		   $('#sort_price').on('change', function(){  
			   var url = $(this).val();	
			   // alert(url);
			   if (url){
				   window.location = url;		
			   }
			   return false;
		   });
		});
   </script>
</body>
</html>