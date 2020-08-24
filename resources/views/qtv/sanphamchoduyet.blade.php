@extends('qtv')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      SẢN PHẨM CHỜ DUYỆT
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Avatar</th>
            <th>Giá</th>
            <th>So luong</th>
           	<th>Ten shop</th>
           	<th></th>
           
          </tr>
        </thead>
        <tbody>
          @foreach($sanpham as $s)
          	@foreach($nguoidung as $nd)
          		@if($nd->id == $s->idnguoidung)
          <tr>
            
            <td><a href="{{ URL::to('qtv/chi-tiet',$s->id) }}">{{$s->ten}}</a></td> 
            <td><span class="text-ellipsis"><img src="frontend/img/product/{{$s->avatar}}" alt="" height="70px" width="60px"></span></td>
            <td><span class="text-ellipsis">{{number_format($s->gia,0)}} VNĐ</span></td>
            <td>@foreach($nhap as $p)
					@if($p->idnguoidung == $nd->id)
						@if($p->idsanpham == $s->id)
						 {{$p->soluong}}
@endif
@endif
@endforeach
	
				
            </td>
            <td>{{$nd->tenshop}}</td>
            <td>
              <a href="{{ URL::to('qtv/duyetsp',$s->id) }}"><i class="fa fa-check text-success text-active"></i></a><a href="{{ URL::to('qtv/khongduyet',$s->id) }}"><i class="fa fa-times text-danger text"></i></a>
            </td>

          </tr>
          @break
          @endif
          @endforeach
          @endforeach

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
         {{$sanpham->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		@endsection