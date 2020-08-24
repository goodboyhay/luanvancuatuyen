@extends('master')
@section('content')
<div class="page-top-info">
		<div class="container">
			<h4>Thông tin </h4>
			<div class="site-pagination">
				<a href="{{URL::to('/')}}">Trang chủ</a>
				
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	@php
	$tong=0;
	@endphp
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="{{URL::to('payment')}}" method="post">
						<div class="cf-title">
							<a href="#boxnoidung" aria-expanded="false" data-toggle="collapse" style="color: #FFFFFF">Chọn địa chỉ giao hàng</a></div>
						@csrf
						
						<div class="row address-inputs collapse" id="boxnoidung">
										Tên	<br><input type="text" name="ten" value="{{$nguoidung->ten}}" placeholder="{{$nguoidung->ten}}">
										SĐT <br>	<input type="text" name="sdt" value="{{$nguoidung->sdt}}" placeholder="{{$nguoidung->sdt}}">
										Địa chỉ	<br><input type="text" name="diachi" value="{{$nguoidung->diachi}}" placeholder="{{$nguoidung->diachi}}">
						</div>
						

						<div class="cf-title" ><a href="#boxgiaohang" aria-expanded="false" data-toggle="collapse" style="color: #FFFFFF">Chọn hình thức giao hàng</a></div>
						<div class="row shipping-btns collapse" id="boxgiaohang">
							<div class="col-6">
								<h4>Giao ngay </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns ship">
									<div class="cfr-item">
										<input type="radio" value="300000" name="shipping" id="ship-1">
										<label for="ship-1">30 000 VNĐ</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Giao tiêu chuẩn</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns ship">
									<div class="cfr-item">
										<input type="radio" value="20000" name="shipping" id="ship-2">
										<label for="ship-2">20 000 VNĐ</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title" style="margin-top: -25px"><a href="#boxthanhtoan" aria-expanded="false" data-toggle="collapse" style="color: #FFFFFF">Hình thức thanh toán</a></div>
						<ul class="payment-list collapse" id="boxthanhtoan" >
							<li>
								<input type="radio" > Ví điện tử <img src="frontend/img/paypal.png" alt="">
							</li>
							<li>
								<input type="radio" > Credit/Visa Master Card <img src="frontend/img/mastercart.png" alt="">
							</li>
							<li>
								<input type="radio"  checked> Thanh toán khi nhận hàng
							</li>
						</ul>
						<button type="submit" class=" btn btn-secondary dathang">Đặt hàng</button>
					
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Giỏ hàng</h3>
						<ul class="product-list">
							@if(Session::has('cart'))
								@foreach(Session::get('cart') as $key => $cart) 
								@php 
									$tong=$tong+$cart['product_price']*$cart['product_qty'];
								@endphp
							<li>
								<div class="pl-thumb"><img src="frontend/img/product/{{$cart['product_image']}}" alt=""></div>
								<h6>{{$cart['product_name']}}</h6>
								<p>{{number_format($cart['product_price'],0)}} VNĐ</p>
							</li>
							
							@endforeach
							@else 
								Giỏ hàng trống
							@endif
						</ul>
						<ul class="price-list">
							<li>Total <b style="margin-left :90px" id="tien" value="{{$tong}}">{{number_format($tong,0)}} VNĐ</b></li>
							<li>Shipping<b style="margin-left :90px" id="a" > VNĐ</b></li>
							<li class="total">Total<span id="tong"></span></li>
						</ul>
					</div>
				</div>
				</form>
			</div>
		</div>
	</section>
@endsection