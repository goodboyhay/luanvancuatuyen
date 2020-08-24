@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info contact-form">
					<h3 align="center">Thông tin cá nhân</h3>
						Email<input type="text" placeholder="{{$tk->email}}" name="email" readonly="">
						Địa chỉ<input type="text" placeholder="{{$tk->diachi}}" name="password" readonly="">
						Họ tên<input type="text" placeholder="{{$tk->ten}}" name="ten" readonly="">
						Số điện thoại<input type="text" placeholder="{{$tk->sdt}}" name="sdt" readonly="">
						
						
						<a href="">Sửa thông tin</a>
				</div>

				
					</div>

		</div>


	</section>
@endsection