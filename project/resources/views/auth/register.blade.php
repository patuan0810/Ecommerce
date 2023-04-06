<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/auth/css/style.css')}}">
    <link href="{{asset('frontend/auth/css/bootstrap.min.css')}}" rel="stylesheet">
	<script src="{{asset('frontend/auth/js/jquery-3.3.1.slim.min.js')}}"></script>
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	
</head>
<body>
	<div class="infinity-container">
		
		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Tạo tài khoản</div>
			
			<div class="infinity-fold">
				<div class="infinity-form">
					<form class="form-box" action="{{URL::to('registerApi')}}" method="POST">
						@csrf
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" name="name" placeholder="Họ tên" tabindex="10"required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email" tabindex="10"required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Mật khẩu" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="c_password" placeholder="Nhập lại mật khẩu" required>
						</div>
						<!-- Register Button -->
						<div class="col-12 px-0 text-center">
							<button type="submit" class="btn mb-3">Đăng ký</button>
						</div>
						<div class="text-center text-sm">đăng nhập với</div>
						<div class="infinity-social-btn text-center">
							<ul class="text-center">
								<!-- Facebook Button -->
								<li class="text-center"><a href="#" class="facebook">
									<i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a>
								</li>
								<!-- Google Button -->
								<li class="text-center"><a href="#" class="google">
									<i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a>
								</li>
								<!-- Twitter Button -->
								<li class="text-center"><a href="#" class="twitter">
									<i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a>
								</li>
							</ul>
						</div>
						<div class="text-center">Đã có tài khoản?
							<a class="login-link" href="{{URL::to('/dang-nhap')}}">Đăng nhập</a>
		            	</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>
	
</body>
</html>
