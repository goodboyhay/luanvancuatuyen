@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					@if(Session::has('dki'))
					<h3 style="color: green">{{ Session::get('dki') }}
					{{Session::forget('dki')}}</h3>
					@endif
					@if(Session::has('error'))
					<h3 style="color: red">{{ Session::get('error') }}</h3>
					@endif
					<h3 align="center">Đăng kí</h3>
					<form class="contact-form" action="{{ URL::to('/postRegister') }}" method="post" name="register">
						@csrf
						<input type="email" placeholder="Email" name="email">
						<input type="password" placeholder="Mật khẩu" name="password">
						<input type="text" placeholder="Họ tên" name="ten">
						<input type="text" placeholder="Số điện thoại" name="sdt">
						<input type="text" placeholder="Địa chỉ" name="diachi">
						<button class="site-btn reg" type="submit">Đăng kí</button>
					</form>
				</div>
				<div class="col-lg-6 contact-info">
					<h3 align="center">Đăng nhập</h3>

				<form action="{{URL::to('/postLogin')}}" method="post" class="contact-form">
					@csrf
					<input type="email" name="email" placeholder="Nhập email của bạn"><br>
					<input type="password" name="password" placeholder="Nhập mật khẩu"><br>
					<input type="submit" class="btn btn-primary" style="background-color: green">
					<a href="">Quên mật khẩu</a>
				</form>
				</div>
					</div>

		</div>


	</section>
@endsection