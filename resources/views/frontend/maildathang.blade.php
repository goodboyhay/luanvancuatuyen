Chào bạn,<br>
Cảm ơn bạn đã đặt hàng ở Website chúng tôi. <br>
Danh sách sản phẩm <br>


				@foreach(Session::get('cart') as $key => $cart) 
				{{$tong=0}}
								@php 
									$tong=$tong+$cart['product_price']*$cart['product_qty'];
								@endphp
								
<b>Tên:</b>{{$cart['product_name']}} 
<b>Giá:</b>{{number_format($cart['product_price'],0)}} VND
<b>Số lượng:</b>{{$cart['product_qty']}}
											
                    					<br>
								@endforeach


<b>Tổng đơn hàng :</b>
								<?php echo number_format($tong,0)."VNĐ" ?>