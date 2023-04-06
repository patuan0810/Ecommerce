<header id="header"><!--header-->
			<div class="header_top"><!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="#"><i class="fa fa-phone"></i> 0914046121</a></li>
									<li><a href="#"><i class="fa fa-envelope"></i> DTK@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header_top-->
			
			<div class="header-middle"><!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="logo pull-left">
								<a href="{{URL::to('/trang-chu')}}"><img src="{{asset('frontend/images/logo.png')}}" width="110px" height="100px" alt="" /></a>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									<li><a href="{{URL::to('/thanh-toan')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
									<li><a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>

									@if (auth()->check())
									<li>
										<a href="{{URL::to('/tai-khoan')}}"><i class="fa fa-user"></i> Xin Chào: {{Auth::user()->name}}</a>
										<ul class="submenu">
											<li class="menu-item">
												{{-- <a href="{{URL::to('doi-mat-khau')}}"">Đổi mật khẩu</a> --}}
											</li>
											<li class="menu-item">
												<a href="{{URL::to('logout')}}">Đăng xuất</a>
											</li>
										</ul>
									</li>
									
									@endif
									@if (!auth()->check())
									<li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>

									@endif

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-middle-->
		
			<div class="header-bottom"><!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li class="active"><a href="{{URL::to('/trang-chu')}}" >Trang chủ</a></li>
									<li class="dropdown"><a href="{{URL::to('/san-pham')}}">Sản phẩm</a>
									</li> 
									<li class="dropdown"><a href="{{URL::to('/gioi-thieu')}}">Giới Thiệu</a>
									</li> 
									<li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<form action="{{URL::to('/tim-kiem')}}" method="POST">
								{{csrf_field()}}
								<div class="search_box pull-right">
									<input type="text" name="keywords_submit" placeholder="Tìm kiếm"/>
									<input type="submit" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!--/header-bottom-->
	</header><!--/header-->