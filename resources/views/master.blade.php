<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Tipe - Website mua bán điện thoại</title>
	<base href="{{URL :: asset(' ')}}">
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="frontend/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="frontend/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="frontend/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="frontend/css/flaticon.css"/>
	<link rel="stylesheet" href="frontend/css/slicknav.min.css"/>
	<link rel="stylesheet" href="frontend/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="frontend/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="frontend/css/animate.css"/>
	<link rel="stylesheet" href="frontend/css/style.css"/>
	<link rel="stylesheet" href="frontend/css/sweetalert.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{ URL::to('/') }}" class="site-logo">
							<img src="frontend/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="{{URL::to('search')}}" method="get">
							@csrf
							<input type="text" name="key" placeholder="Tìm sản phẩm">
							<button type="submit"><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								@if(Session::has('email'))
								<ul class="main-menu">
									<li>Xin Chào {{Session::get('email')}}
										<ul class="sub-menu">
											
												<li><a href="{{URL::to('doithongtin')}}">Thông tin cá nhân</a></li>
												@if(Session::has('nd'))
												
													@if(Session::get('nd')!=null)
													<li><a href="{{URL::to('admin/dashboard')}}">Kênh người bán</a></li>
													@endif
												
												@endif
												<li><a href="">Lịch sử đặt hàng</a></li>
												<li><a href="{{URL::to('yeuthich')}}">Danh sách yêu thích</a></li>
												<li><a href="{{URL::to('logout')}}">Đăng xuất</a></li>
											
										</ul>
									</li>
								</ul>
								@else
								<a href="{{URL::to('register')}}">Đăng nhập Hoặc Đăng ký</a>
								@endif
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>





									<span>
										@if(Session::has('cart'))
											{{count(Session::get('cart'))}}

											@else
												0
										@endif
									</span>
								</div>
								
								<a href="{{URL::to('cart')}}">Giỏ hàng</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
					<li><a href="{{URL::to('all')}}">Điện thoại</a>
						<ul class="sub-menu">
							@foreach($menu as $m)
								<li><a href="{{URL::to('danhmuc',$m->id)}}">{{$m->mahang}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="#">Giới thiệu</a></li>
					<li><a href="{{URL::to('lienhe')}}">Hỏi đáp</a></li>
					<li><a href="{{URL::to('lienhe')}}">Đăng ký bán hàng</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->



	@yield('content')
	<!-- Product filter section end -->


	<!-- Banner section -->
	
	<!-- Banner section end  -->


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>THÔNG TIN</h2>
						<div class="con-info">
							<span>LVTN</span>
							
						</div>
						<div class="con-info">
							<span>180 Cao Lỗ , Phường 4 , Quận 8 , TPHCM</span>
							
						</div>
						<div class="con-info">
							<span>0772781926</span>
							
						</div>
						<div class="con-info">
							<span>nguyenhuynh.quynhtuyen@gmail.com</span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="frontend/js/jquery-3.2.1.min.js"></script>
	<script src="frontend/js/bootstrap.min.js"></script>
	<script src="frontend/js/jquery.slicknav.min.js"></script>
	<script src="frontend/js/owl.carousel.min.js"></script>
	<script src="frontend/js/jquery.nicescroll.min.js"></script>
	<script src="frontend/js/jquery.zoom.min.js"></script>
	<script src="frontend/js/jquery-ui.min.js"></script>
	<script src="frontend/js/main.js"></script>
	<script src="frontend/js/sweetalert.min.js"></script>
	<script src="frontend/js/sweetalert.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var cart_product_nguoiban = $('.cart_product_nguoiban_' + id).val();
                var cart_product_ton = $('.cart_product_ton_' + id).val();
                var _token = $('input[name="_token"]').val();
               $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_ton:cart_product_ton,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_nguoiban:cart_product_nguoiban,_token:_token},
                    success:function(){

                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('cart')}}";
                            });

                    }

                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        	$('.ship').click(function(){
        		var d1=document.getElementById('ship-1');
        		var s1=$('#ship-1').val();
        		var d2=document.getElementById('ship-2');
        		var s2=$('#ship-2').val();
        		var ship = document.getElementById('a');
        		d1.onclick=function(){
        			ship.innerHTML=s1 +"VNĐ";
        		};
        		d2.onclick=function(){
        			ship.innerHTML=s2 + "VNĐ";
        		};

        	});
        	var t1=$('#tien').val();
        	var t2=$('#a').val();

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.locsp').click(function(){
            	var d=$('.gia').val();
              	alert(d);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.delsp').click(function(){
            	swal('Xoa thanh cong');
            });});
        </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dathang').click(function(){
            	
            });});
        </script>
         <script type="text/javascript">
        $(document).ready(function(){
            $('.diachi').click(function(){
            	alert('Xoa thanh cong');
            });
        });
        </script>
        //CHeck dki
		<script type="text/javascript">
			if({{Session::has('checkdn')}}){
				alert("Đăng nhập thành công");
				{{Session::forget('checkdn')}}
			}
		</script>
		<script type="text/javascript">
			if({{Session::has('dhthanhcong')}})
			{
				swal("Đặt hàng thành công  Kiểm tra trong email của bạn");
				{{Session::forget('dhthanhcong')}}
			}
		</script>
		

	</body>
</html>
