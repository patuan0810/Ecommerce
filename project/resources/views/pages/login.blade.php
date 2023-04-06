@extends('layout')
@section('title','Đăng nhập')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập</h2>
						<form action="#">
							<input type="email" placeholder="Email" />
							<input type="password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Ký</h2>
						<form action="#">
							<input type="email" placeholder="Email"/>
							<input type="text" placeholder="Họ Và Tên"/>
							<input type="password" placeholder="Mật khẩu"/>
							<button type="submit" class="btn btn-default">Đăng Ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@endsection