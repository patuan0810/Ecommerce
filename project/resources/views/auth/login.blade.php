<!DOCTYPE html>
<html>

<head>
	<title>Đăng nhập</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/auth/css/style.css')}}">
    <link href="{{asset('frontend/auth/css/bootstrap.min.css')}}" rel="stylesheet">
	<script src="{{asset('frontend/auth/js/jquery-3.3.1.slim.min.js')}}"></script>
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">


</head>

<body>
	<div class="infinity-container">
		
		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Đăng nhập</div>

			<div class="infinity-fold">
				<div class="infinity-form">
					<form class="form-box" action="{{URL::to('loginApi')}}" method="POST">
						@csrf
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Mật khẩu" required>
						</div>
						<div class="row mb-2">
							<!--Remember Checkbox -->
							<div class="col-6 d-flex align-items-center">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
									<label class="custom-control-label text-sm" for="remember_me">Lưu đăng nhập
									</label>
								</div>
							</div>
							<!-- Forget Password -->
							<div class="col-6 text-right text-sm">
								<a href="{{URL::to('/quen-mat-khau')}}" class="forget-link">Quên mật khẩu?</a>
							</div>
						</div>
						<!-- Login Button -->
						<div class="col-12 px-0 text-center">
							<button type="submit" class="btn mb-3">Đăng nhập</button>
						</div>

						<div class="text-center text-sm">đăng nhập với</div>
						<div class="infinity-social-btn text-center">
							<ul class="text-center">
								<li class="text-center"><a href="#" class="facebook">
										<i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a>
								</li>
								<li class="text-center"><a href="#" class="google">
										<i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a>
								</li>
								<li class="text-center"><a href="#" class="twitter">
										<i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a>
								</li>
							</ul>
						</div>
						<div class="text-center">Chưa có tài khoản?
							<a class="register-link" href="{{URL::to('/dang-ky')}}">Đăng ký</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>
</body>

</html>
