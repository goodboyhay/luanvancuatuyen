<!-- Hero section -->
@extends('master')
@section('content')
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="frontend/img/bg.png">
			</div>
			<div class="hs-item set-bg" data-setbg="frontend/img/bg-2.png">
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/1.png" alt="#">
						</div>
						<h2>Giao hàng nhanh chóng</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/2.png" alt="#">
						</div>
						<h2>Sản phẩm đặc biệt</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="frontend/img/icons/3.png" alt="#">
						</div>
						<h2>Miễn phí vận chuyển</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM MỚI NHẤT</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($product as $p)
				<div class="product-item">
					<div class="pi-pic">
						

						<a href="{{URL::to('sanpham',$p->id)}}"> 
							<img src="./frontend/img/product/{{$p->avatar}}" alt="">
						</a>
						<div class="pi-links">
							<form>
							 @csrf
                                            <input type="hidden" value="{{$p->id}}" class="cart_product_id_{{$p->id}}">
                                            <input type="hidden" value="{{$p->ten}}" class="cart_product_name_{{$p->id}}">
                                            <input type="hidden" value="{{$p->avatar}}" class="cart_product_image_{{$p->id}}">
                                            <input type="hidden" value="{{$p->gia}}" class="cart_product_price_{{$p->id}}">
                                            <input type="hidden" value="{{$p->idnguoidung}}" class="cart_product_nguoiban_{{$p->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$p->id}}">
                                            <a aria-expanded="false" data-id_product="{{$p->id}}" class="add-card add-to-cart"><i class="flaticon-bag"></i><span>Thêm vào giỏ</span></a>
                                            
							
</form>
							<a href="{{URL::to('themyeuthich',$p->id)}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{number_format($p->gia,0)}} VND</h6>
						<a href="{{URL::to('sanpham',$p->id)}}">
							<p>{{$p->ten}}</p>
					</div></a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM TÌM KIẾM NHIỀU</h2>
			</div>
			<div class="row">
				@foreach($viewproduct as $v)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<a href="{{URL::to('sanpham',$v->id)}}"><img src="./frontend/img/product/{{$v->avatar}}" alt=""></a>
							<div class="pi-links">
								<form>
							 @csrf
                                            <input type="hidden" value="{{$v->id}}" class="cart_product_id_{{$v->id}}">
                                            <input type="hidden" value="{{$v->ten}}" class="cart_product_name_{{$v->id}}">
                                            <input type="hidden" value="{{$v->avatar}}" class="cart_product_image_{{$v->id}}">
                                            <input type="hidden" value="{{$v->gia}}" class="cart_product_price_{{$v->id}}">
                                            <input type="hidden" value="{{$v->idnguoidung}}" class="cart_product_nguoiban_{{$v->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$v->id}}">
                                            <a class="add-card"><i class="flaticon-bag"></i><span class="add-to-cart" data-id_product="{{$v->id}}">ADD TO CART</span></a>
							
</form>
								<a href="{{URL::to('themyeuthich',$v->id)}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>{{number_format($v->gia,0)}} VND</h6>
							<a href="{{URL::to('sanpham',$v->id)}}"><p>{{$v->ten}} </p></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endsection