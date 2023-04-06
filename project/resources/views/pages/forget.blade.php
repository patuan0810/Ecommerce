<!DOCTYPE html>
<html>
<head>
	<title>Quên mật khẩu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/auth/css/style.css')}}">
    <link href="{{asset('frontend/auth/css/bootstrap.min.css')}}" rel="stylesheet">
	<script src="{{asset('frontend/auth/js/jquery-3.3.1.slim.min.js')}}"></script>
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
	<div class="infinity-container">
		
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Đặt lại mật khẩu</div>
			
			<div class="infinity-fold">
				<div class="infinity-form">
					<div class="reset-form d-block">
					    <form class="reset-password-form px-3">
			                <p class="mb-3" style="color: #777">
			                    Hãy nhập địa chỉ email mà bạn đã quên mật khẩu.
			                </p>
			                <div class="form-input">
								<span><i class="fa fa-envelope"></i></span>
								<input type="email" name="" placeholder="Email" tabindex="10"required>
							</div>
				              
				            <div class="col-12 mb-3 text-center"> 
								<button type="submit" class="btn">Tiếp theo</button>
							</div>
				        </form>
					</div>
					<div class="reset-confirmation d-none px-3">
					    <div class="mb-4">
					        <h4 class="mb-3">Đã hoàn thành</h4>
					        <h6 style="color: #777">Hãy kiểm tra hộp thư và ấn vào link để đặt lại mật khẩu.</h6>
					    </div>
						<div class="text-right">
					    	<a href="{{URL::to('/dang-nhap')}}">
					        	<button type="submit" class="btn">Đăng nhập ngay</button>
					    	</a>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function PasswordReset() {
			$('form.reset-password-form').on('submit', function(e){
				e.preventDefault();
				$('.reset-form')
				.removeClass('d-block')
				.addClass('d-none');
				$('.reset-confirmation').addClass('d-block');
			});
		}

		window.addEventListener('load',function(){
			PasswordReset();
		});
	</script>
	
</body>
</html>
