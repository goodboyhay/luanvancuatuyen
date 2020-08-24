@extends('master')
@section('content')


<div class="page-top-info">
		<div class="container">
			<h4>GIỎ HÀNG CỦA BẠN</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
@if(Session::has('cart'))
	@if(count(Session::get('cart'))==0)

	
	@endif
	<!-- cart section end -->@php
	$tong=0;
	@endphp
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Giỏ hàng</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th" style="font-size: 17px">Sản phẩm</th>
									<th class="quy-th"  style="font-size: 17px">Số lượng</th>
									
									<th class="total-th"  style="font-size: 17px">Tổng tiền</th>
									<th class="product-th"></th>
								</tr>
							</thead>
							<tbody><form method="post" action="{{URL::to('update-cart')}}" >
								@csrf
								@if(Session::has('cart'))
								@foreach(Session::get('cart') as $key => $cart) 
								@php 
									$tong=$tong+$cart['product_price']*$cart['product_qty'];
								@endphp
								<tr>
									<td class="product-col">
										<img src="frontend/img/product/{{$cart['product_image']}}
" alt="">
										<div class="pc-title">
											<h4>{{$cart['product_name']}}
</h4>
											<p>{{number_format($cart['product_price'],0)}} VND</p>
</p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                       
												@foreach($sanpham as $s)
													@if($s->id==$cart['product_id'])
														<input type="number" style="width: 50px" max="{{$s->conlai}}" maxlength="2" name="{{$cart['session_id']}}" min="1" value="{{$cart['product_qty']}}">

															
															@endif
												@endforeach
											
                    					</div>
									</td>
									
									<td class="total-col"><h6>{{number_format($cart['product_price']*$cart['product_qty'],0)}} VND</h6></td>
									<td class="total-col"><a href="{{URL::to('delete-product',$cart['session_id'])}}" class="delsp" >Xoa</a></td>
								</tr>
								@endforeach
								
								@endif

							</tbody>
						</table>
						</div>
						<div class="total-cost"><div style="margin-right: 250px">
							<button type="submit" class="btn btn-secondary" style="margin-top: -20px ;margin-bottom: 20px ; padding-left: ">Cập nhật giỏ hàng</button> 
							<a href="{{URL::to('delete-all')}}">
								<button type="button" class="btn btn-secondary"  style="margin-top: -20px ;margin-bottom: 20px ; padding-left: ">Xóa tât cả</button>
							</a></div>

							<h6>Tổng cộng <span>{{number_format($tong,0)}}VND</span></h6>
</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">

					@if(Session::has('email'))
						<a href="{{URL::to('checkout')}}" class="site-btn">Tiến hành thanh toán</a>
					@else
						<a href="{{URL::to('register')}}" class="site-btn">Đăng nhập để thanh toán</a>
					@endif
					<a href="" class="site-btn sb-dark">Tiếp tục mua hàng</a>
				</div>
			</div>
		</div>
	</section>
	@else 
	<span style="font-size: 20px">Giỏ hàng trống</span>
	@endif
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Tiếp tục mua hàng</h2>
			</div>
			<div class="row">
				@foreach($random as $r)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="frontend/img/product/{{$r->avatar}}" alt="">
							<div class="pi-links">
								<form>
							 @csrf
                                            <input type="hidden" value="{{$r->id}}" class="cart_product_id_{{$r->id}}">
                                            <input type="hidden" value="{{$r->ten}}" class="cart_product_name_{{$r->id}}">
                                            <input type="hidden" value="{{$r->avatar}}" class="cart_product_image_{{$r->id}}">
                                            <input type="hidden" value="{{$r->gia}}" class="cart_product_price_{{$r->id}}">
                                            <input type="hidden" value="{{$r->idnguoidung}}" class="cart_product_nguoiban_{{$r->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$r->id}}">
                                            <a class="add-card"><i class="flaticon-bag"></i><span class="add-to-cart" data-id_product="{{$r->id}}">ADD TO CART</span></a>
							
</form>
								<a href="{{URL::to('themyeuthich',$r->id)}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>{{number_format($r->gia,0)}}VND</h6>
							<p>{{$r->ten}}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endsection