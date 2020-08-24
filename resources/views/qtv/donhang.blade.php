@extends('qtv')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      ĐƠN HÀNG CẦN XÁC NHẬN
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Ma don hang</th>
            <th>Ten nguoi dat</th>
            <th>SDT</th>
            <th>Dia chi</th>
           	
           	<th></th>
           
          </tr>
        </thead>
        <tbody>
          @foreach($donhang as $s)
          	
          <tr>
           
            <td>{{$s->ma}}</td>
            <td>{{$s->ten}}</td>
            <td>{{$s->sdt}}</td>
            <td>{{$s->diachi}}</td>
            <td><a href="{{URL::to('qtv/chitiet-donhang',$s->id)}}">Chi tiết</a></td>
            <td>
             <a href="{{URL::to('qtv/xac-nhan-don-hang',$s->id)}}"> <i class="fa fa-check text-success text-active"></i></a>
            </td>
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