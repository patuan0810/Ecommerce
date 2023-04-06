@extends('layout')
@section('title','Chi tiết sản phẩm')
@section('content')
@foreach($details_product as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<ul id="imageGallery">
							<li data-thumb="{{asset('frontend/images/product/'.$value['product_image'])}}" data-src="{{asset('frontend/images/product/'.$value['product_image'])}}">
								<img src="{{asset('frontend/images/product/'.$value['product_image'])}}" width="100%" />
							</li>
							<li data-thumb="{{asset('frontend/images/product/'.$value['product_image_1'])}}" data-src="{{asset('frontend/images/product/'.$value['product_image_1'])}}">
								<img src="{{asset('frontend/images/product/'.$value['product_image_1'])}}" width="100%" />
							</li>
							<li data-thumb="{{asset('frontend/images/product/'.$value['product_image_2'])}}" data-src="{{asset('frontend/images/product/'.$value['product_image_2'])}}">
								<img src="{{asset('frontend/images/product/'.$value['product_image_2'])}}" width="100%" />
							</li>
							<li data-thumb="{{asset('frontend/images/product/'.$value['product_image_3'])}}" data-src="{{asset('frontend/images/product/'.$value['product_image_3'])}}">
								<img src="{{asset('frontend/images/product/'.$value['product_image_3'])}}" width="100%" />
							</li>
						</ul>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$value['product_name']}}</h2>
								<form action="{{URL::to('/save-cart')}}" method="POST">
								{{csrf_field()}}
								<span>
									<span>{{number_format($value['product_price']). ' VNĐ'}}</span>
									<label>Số Lượng :</label>
									<input name="qty" type="number" min="1" max="50" value="1" />
									<input name="productid_hidden" type="hidden" value="{{$value['product_id']}}" /><br>
								</span>
								<span><button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Mua Ngay
								</button></span>
								</form>
								<br>
								<p><b>Mã Sản Phẩm: </b>{{$value['product_id']}}</p>
								<p><b>Thương Hiệu:</b> {{$value['category_name']}}</p>
								<p><b>Bảo hành:</b> {{$value['product_guarantee']}} tháng</p>
								<p><b>Xuất xứ:</b> {{$value['product_origin']}}</p>
								<p><b>Tình Trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->
@endforeach        

@foreach($details_product as $key => $value)
<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Tính năng nổi bật</a></li>
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content"> 
							<div class="tab-pane fade active in" id="details" >
								<p style="color: black;">{!!$value['product_details']!!}</p>
								<img src="{{URL::to('frontend/images/product/'.$value['product_image_1'])}}" alt="" />
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<b>Máy ảnh {{$value['product_name']}}</b>
								<li>{{$value['product_feature_1']}}</li>
								<li>{{$value['product_feature_2']}}</li>
								<li>{{$value['product_feature_3']}}</li>
								<li>{{$value['product_feature_4']}}</li>
								<li>{{$value['product_feature_5']}}</li>
								<li>{{$value['product_feature_6']}}</li>
								
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>DTTK - SHOP</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>09:54 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>12/10/2022</a></li>
									</ul>
									<p><b>Viết đánh giá của bạn</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Họ & Tên"/>
											<input type="email" placeholder="Email"/>
										</span>
										<textarea name="" ></textarea>
										<b>Xếp hạng: </b> <img src="{{asset('frontend/images/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Gửi
										</button>
									</form>
								</div>
							</div>
							
						</div>
</div><!--/category-tab-->
@endforeach($)

<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Bạn cũng có thể thích</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								@foreach($related_product as $key => $recommend)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to('frontend/images/product/'.$recommend['product_image'])}}" alt="" />
													<h2>{{number_format($recommend['product_price']).' VNĐ'}}</h2>
													<p>{{$recommend['product_name']}}</p>
													<a href="{{URL::to('/chi-tiet-san-pham/'.$recommend['product_id'])}}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</button></a>
												</div>
											</div>
										</div>
									</div>
								@endforeach

								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

			
@endsection