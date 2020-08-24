@extends('qtv')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SACH KHACH HANG
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên thanh vien</th>
            <th>SDT</th>
            <th>Email</th>
            <th>Avatar</th>
           	
          
           
          </tr>
        </thead>
        <tbody>
          @foreach($thanhvien as $s)
          	
          <tr>
           
            <td>{{$s->ten}}</td>
            <td><span class="text-ellipsis"><img src="frontend/img/product/{{$s->avatar}}" alt="" height="70px" width="60px"></span></td>
           
            <td>{{$s->sdt}}</td>
            <td>{{$s->email}}</td>
            
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
         {{$thanhvien->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		@endsection