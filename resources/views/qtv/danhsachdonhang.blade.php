@extends('qtv')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH ĐƠN HÀNG
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead><a href="#">
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người đặt</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th></th>
          </tr></a>
        </thead>
        <tbody>
          @foreach($donhang as $s)
          	
          <tr>
           
            <td>{{$s->ma}}</td>
            <td>{{$s->ten}}</td>
            <td>{{$s->sdt}}</td>
            <td>{{$s->diachi}}</td>
            <td><a href="{{URL::to('qtv/chitiet-donhang',$s->id)}}">Chi tiết</a></td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
         {{$donhang->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		@endsection