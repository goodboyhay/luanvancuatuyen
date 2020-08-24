@extends('adminmaster')
@section('content')
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           
                        </header>
                        Tổng số đơn hàng {{count($ma)}}<br>
                        Danh sách hóa đơn
                        <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>Mã hóa đơn</th>
            <th>Tên người đặt</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        	
				@foreach($hoadon as $m)
				 <tr>
				 	<td>{{$m->ma}}</td>
				 	<td>{{$m->ten}}</td>
				 	<td>{{$m->diachi}}</td>
				 	<td>{{$m->sdt}}</td>
                    <td><a href="{{URL::to('/admin/chi-tiet',$m->id)}}">Chi tiết</a></td>
				 </tr>
		         @endforeach
        	
	         
        </tbody>
      </table>
                    </section>

            </div>
          
        </div>
        

        


        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		 @endsection