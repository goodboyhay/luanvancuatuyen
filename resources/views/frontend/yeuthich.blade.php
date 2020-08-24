@extends('master')
@section('content')
	<div class="page-top-info">
		<div class="container">
			<h4>Sản phẩm yêu thích</h4>
			<div class="site-pagination">
				<a href="">Trang chủ</a> /
				
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					
				</div>


				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						@foreach($sp as $p)
						
							<div class="col-lg-4 col-sm-6">
						
							<div class="product-item">
								<div class="pi-pic">
									<a href="{{URL::to('sanpham',$p->id)}}"><img src="frontend/img/product/{{$p->avatar}}" alt=""></a>
									<div class="pi-links">
										<form>
							 @csrf
                                            <input type="hidden" value="{{$p->id}}" class="cart_product_id_{{$p->id}}">
                                            <input type="hidden" value="{{$p->ten}}" class="cart_product_name_{{$p->id}}">
                                            <input type="hidden" value="{{$p->avatar}}" class="cart_product_image_{{$p->id}}">
                                            <input type="hidden" value="{{$p->gia}}" class="cart_product_price_{{$p->id}}">
                                            <input type="hidden" value="{{$p->idnguoidung}}" class="cart_product_nguoiban_{{$p->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$p->id}}">
                                            <a class="add-card"><i class="flaticon-bag"></i><span class="add-to-cart" data-id_product="{{$p->id}}">ADD TO CART</span></a>
							
</form>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>$35,00</h6>
									<p>{{$p->ten}}</p>
								</div>
							</div>
							
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection