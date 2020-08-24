@extends('master')
@section('content')
	<div class="page-top-info">
		<div class="container">
			<h4>Sản phẩm</h4>
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
					<form >
					<div class="filter-widget">
						<h2 class="fw-title">Hãng</h2>
						
							@foreach($menu as $m)
								<input type="checkbox" value="{{$m->id}}" class="hang">   {{$m->mahang}} <br>
							@endforeach
					</div>
					<button type="button" class="btn btn-secondary locsp">Tìm</button>
				</div>

			</form>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						@foreach($product as $p)
						
							<div class="col-lg-4 col-sm-6">
						
							<div class="product-item">
								<div class="pi-pic">
									<a href="{{URL::to('sanpham',$p->id)}}	"><img src="frontend/img/product/{{$p->avatar}}" alt=""></a>
									<div class="pi-links">
										<form>
							 @csrf
                                            <input type="hidden" value="{{$p->id}}" class="cart_product_id_{{$p->id}}">
                                            <input type="hidden" value="{{$p->ten}}" class="cart_product_name_{{$p->id}}">
                                            <input type="hidden" value="{{$p->avatar}}" class="cart_product_image_{{$p->id}}">
                                            <input type="hidden" value="{{$p->gia}}" class="cart_product_price_{{$p->id}}">
                                            <input type="hidden" value="{{$p->idnguoidung}}" class="cart_product_nguoiban_{{$p->id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$p->id}}">
                                            <a class="add-card"><i class="flaticon-bag"></i><span data-id_product="{{$p->id}}"class="add-to-cart" >ADD TO CART</span></a>
							
</form>
										<a href="{{URL::to('themyeuthich',$p->id)}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>$35,00</h6>
									<p>{{$p->ten}}</p>
								</div>
							</div>
							
						</div>
						@endforeach
						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">XEM THÊM</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection