@extends('layout')
@section('title','Giới thiệu - DTK')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">MỚI NHẤT TỪ BLOG CỦA CHÚNG TÔI</h2>
						<div class="single-blog-post">
							<h3>Nike air for 1</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> DTK</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> NOV 07, 2022</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{URL::to('frontend/images/product/canon1.png')}}" width="100px" height="500px" alt="">
							</a>
							<p>Kỷ niệm 40 năm vượt qua ranh giới thể thao và thời trang, chiếc AF-1 kỷ niệm này kết hợp các yếu tố từ những lần ra mắt được yêu thích để làm nổi bật vị trí của thiết kế vượt thời gian trong lịch sử giày sneaker. Các điểm nhấn bằng vàng, dấu * 40 * được chạm nổi ở gót giày và nhãn hiệu lưỡi danh dự chỉ là một vài trong số những điểm tô điểm mời bạn tham dự bữa tiệc. Hoàn thiện vẻ ngoài, chất liệu da sắc nét với màu sắc đậm mang đến một đêm chung kết tuyệt vời. Chúc mừng kỷ niệm!</p>
							<a  class="btn btn-primary" href="{{URL::to('/san-pham')}}">Tìm hiểu thêm</a>
						</div>
						<div class="single-blog-post">
							<h3>Adidas</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> DTK</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> NOV 07, 2022</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{URL::to('frontend/images/product/nikon1.png')}}" height="500px" alt="">
							</a>
							<p>Sân bóng rổ chỉ mới bắt đầu. Vô số màu sắc sau đó, thiết kế có khả năng thích ứng không ngừng của Bruce Kilgore đã sớm vượt qua rừng cây đến các đường phố và trường quay, nơi nó thực sự cất cánh.</p>
							<a  class="btn btn-primary" href="{{URL::to('/san-pham')}}">Tìm hiểu thêm</a>
						</div>
						<div class="single-blog-post">
							<h3>Puma</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> DTK</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> NOV 07, 2022</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{URL::to('frontend/images/product/sony1.png')}}" height="500px" alt="">
							</a>
							<p>Da cao cấp được làm nổi bật bởi các chi tiết đặc trưng nhằm tôn vinh lịch sử của Lực lượng Không quân 1. Đế ngoài có chốt không thể nhầm lẫn mang lại lực kéo an toàn đã được kiểm nghiệm theo thời gian, trong khi biểu tượng gót và lưỡi kỷ niệm 40 năm có từ năm 1982, năm mà tất cả bắt đầu .</p>
							<a  class="btn btn-primary" href="{{URL::to('/san-pham')}}">Tìm hiểu thêm</a>
						</div>
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
@endsection