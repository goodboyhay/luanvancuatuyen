@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 contact-info">
					<h3 align="center">Nhập email của bạn</h3>
					<form action="{{URL::to('/postQuen')}}" method="post" class="contact-form">
					@csrf
					<input type="email" name="email" placeholder="Nhập email của bạn"><br>
					<input type="submit" class="btn btn-primary" style="background-color: green">
				</form>
				</div>
					</div>

		</div>


	</section>
@endsection