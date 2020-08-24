@extends('master')
@section('content')
<div class="page-top-info">
		<div class="container">
			<h4>THÔNG TIN SẢN PHẨM</h4>
			<div class="site-pagination">
				<a href="">Trang chủ</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="frontend/img/product/{{$product->avatar}}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="frontend/img/product/{{$product->avatar}}"><img src="frontend/img/product/{{$product->avatar}}" alt=""></div>
							@foreach($hinhanh as $a)
							<div class="pt active" data-imgbigurl="frontend/img/img-product/{{$a->img}}"><img src="frontend/img/img-product/{{$a->img}}" alt=""></div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title" style="font-size: 30px">{{$product->ten}}</h2>
					@if($product->conlai>0)
					<h3 class="p-price" style="color: green">Còn hàng ({{$product->conlai}})</h3>
					<h3 class="p-price" style="font-size: 25px">{{number_format($product->gia,0)}} VNĐ</h3>
					<!--<div class="p-rating">
						@for($i=1 ; $i<=5;$i++ )
							@if($i <= $danhgia)
								<i class="fa fa-star-o"></i>
						@else

						<i class="fa fa-star-o fa-fade"></i>
						@endif
						@endfor
					</div>-->
                    <form>
							 @csrf
                                            <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
                                            <input type="hidden" value="{{$product->ten}}" class="cart_product_name_{{$product->id}}">
                                            <input type="hidden" value="{{$product->avatar}}" class="cart_product_image_{{$product->id}}">
                                            <input type="hidden" value="{{$product->gia}}" class="cart_product_price_{{$product->id}}">
                                            <input type="hidden" value="{{$product->idnguoidung}}" class="cart_product_nguoiban_{{$product->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->id}}">
                                            
                                            
							
</form>
					<a href="{{URL::to('cart')}}" class="site-btn add-to-cart" data-id_product="{{$product->id}}">Mua ngay</a>
					@else
					<h3 class="p-price" style="color: red">Hết hàng</h3>
					@endif
					
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" style="font-size: 20px">Thông tin</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body" style="overflow:scroll;">
									<p style="font-size: 20px">RAM :</p>
									<p style="font-size: 20px">PIN </p>
									<p style="font-size: 20px">Bộ nhớ</p>
									<p style="font-size: 20px">Bộ nhớ</p>
									<p style="font-size: 20px">Bộ nhớ</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3" style="font-size: 20px">Bình luận</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									@foreach($comment as $c)
										@foreach($nguoidung as $s)
										@if($s->id == $c->idnguoidung)
										<h4>{{$s->ten}}</h4>
										@endif
										@endforeach
										<span >
										<i>{{$c->binhluan}}</i>
									</span>
									<p>{{$c->created_at}}</p>

									@endforeach
									@if(Session::has('idnd'))
										<form action="{{URL::to('binhluan')}}" method="post" accept-charset="utf-8">
										@csrf
										<input type="text" name="binhluan" class="form-control" placeholder="Nhập bình luận">
										<input type="hidden" name="idsanpham" value="{{$product->id}}">
										<input type="submit" class="btn btn-primary" align="center" >
										</form>
										@else 
										<p style="color: red">Vui lòng đăng nhập để bình luận</p>
										@endif
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM KHÁC</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($random as $lq)

				
					<div class="product-item"><a href="{{URL::to('sanpham',$lq->id)}}">
					<div class="pi-pic">
						<img src="./frontend/img/product/{{$lq->avatar}}" alt="">
						<div class="pi-links">
							<form>
							 @csrf
                                            <input type="hidden" value="{{$lq->id}}" class="cart_product_id_{{$lq->id}}">
                                            <input type="hidden" value="{{$lq->ten}}" class="cart_product_name_{{$lq->id}}">
                                            <input type="hidden" value="{{$lq->avatar}}" class="cart_product_image_{{$lq->id}}">
                                            <input type="hidden" value="{{$lq->gia}}" class="cart_product_price_{{$lq->id}}">
                                            <input type="hidden" value="{{$lq->idnguoidung}}" class="cart_product_nguoiban_{{$lq->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$lq->id}}">
                                            <a class="add-card"><i class="flaticon-bag"></i><span class="add-to-cart" data-id_product="{{$lq->id}}">ADD TO CART</span></a>
							
</form>
							<a href="{{URL::to('themyeuthich',$lq->id)}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{$lq->gia}}</h6>
						<p>{{$lq->ten}} </p>
					</div></a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection