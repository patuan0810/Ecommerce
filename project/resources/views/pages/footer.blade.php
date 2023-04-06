
<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<!-- <h2><span>DTTK</span>-SHOP</h2> -->
							<img src="{{asset('frontend/images/logo.png')}}" width="100%" alt="">
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/iframe1.png')}}"  alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Canon</p>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/iframe2.png')}}" height="50px" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Sony</p>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Nikon</p>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Fujifilm</p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch Vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trợ Giúp Trực Tuyến</a></li>
								<li><a href="{{URL::to('/lien-he')}}">Liên Hệ Chúng Tôi</a></li>
								<li><a href="#">Tình Trạng Đặt Hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thương Hiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($category_product as $key => $cate)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$cate['category_id'])}}"> {{$cate['category_name']}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính Sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>DTTK-SHOP</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">Vị trí cửa hàng</a></li>
								<li><a href="#">Chương trình liên kết</a></li>
								<li><a href="#">Bản quyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>GIỚI THIỆU DTTK-SHOP</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 DTTK - SHOP Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">DTTK</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
