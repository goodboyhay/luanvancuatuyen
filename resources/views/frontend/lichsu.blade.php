@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info contact-form">
					<h3 align="center">Lịch sử đặt hàng</h3>
					<table border="2px">
						<tr>
							<td>Mã đơn hàng</td>
							<td >Tên</td>
							<td >Địa chỉ</td>
							<td >Ngày đặt</td>
							<td>Trạng thái</td>
						</tr>
						@foreach($hoadon as $s)
						<tr>
							<td width="200px" height="90px">{{$s->ma}}</td>
							<td width="300px">{{$s->ten}}</td>
							<td width="200px">{{$s->diachi}}</td>
							<td width="200px">{{$s->created_at}}</td>
							<td width="200px">
								@if($s->trangthai==1)
									<p style="color: green">Đã xác nhận</p>
								@elseif($s->trangthai==-1)
										<p style="color: red">Đã hủy</p>
									
								@else 
									<a href="{{URL::to('huydon',$s->id)}}">Hủy</a>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>


	</section>
@endsection