<!DOCTYPE html>
<html>

<head>
	<title>Đổi mật khẩu</title>
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
			<div class="infinity-click-box text-center">Đổi mật khẩu</div>

			<div class="infinity-fold">
				<div class="infinity-form">
					<form class="form-box" action="{{URL::to('resetApi')}}" method="POST">
						@csrf
						<!-- Input Box -->
					
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="old_password" placeholder="Mật khẩu cũ" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Mật khẩu mới" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="c_password" placeholder="Xác nhận mật khẩu mới" required>
						</div>
						<div class="row mb-2">
							
						<!-- Login Button -->
						<div class="col-12 px-0 text-center">
							<button type="submit" class="btn mb-3">Đổi mật khẩu</button>
						</div>

				
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>
</body>

</html>
