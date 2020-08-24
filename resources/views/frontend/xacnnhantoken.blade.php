@extends('master')
@section('content')
	<section class="contact-section" style="margin-bottom: 10px">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 contact-info">
					<h3 align="center">Nhập Token</h3>
					<form action="{{URL::to('/nhantoken')}}" method="post" class="contact-form">
					@csrf
					
					<input type="text" name="token" placeholder="Nhập đoạn mã đã gữi trong mail"><br>
					<input type="submit" class="btn btn-primary" style="background-color: green">
				</form>
				</div>
					</div>

		</div>


	</section>
@endsection