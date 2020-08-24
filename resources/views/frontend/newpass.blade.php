@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 contact-info">
					<h3 align="center">Nhập Mật Khẩu Mới</h3>
					<form action="{{URL::to('/passmoi')}}" method="post" class="contact-form">
					@csrf
					<input type="hidden" name="email" value="{{$email}}">
					<input type="password" name="password" placeholder="Nhập mật khẩu mới của bạn"><br>
					<input type="submit" class="btn btn-primary" style="background-color: green">
				</form>
				</div>
					</div>

		</div>


	</section>
@endsection