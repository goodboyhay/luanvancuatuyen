@extends('adminmaster')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Sản phẩm đang chờ duyệt
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên sản phẩm</th>
            <th>Avatar</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tinh trang</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($pn as $nhap)
          @foreach($sanpham as $s)
            @if($s->id == $nhap->idsanpham)
          <tr>
            
            <td>{{$s->ten}}</td>
            <td><span class="text-ellipsis"><img src="frontend/img/product/{{$s->avatar}}" alt="" height="70px" width="60px"></span></td>
            <td><span class="text-ellipsis">{{$s->gia}}</span></td>
            <td>{{$nhap->soluong}}</td>
            <td>
              @if($s->tinhtrang == 0)
             
              <i class="fa fa-times text-danger text"></i> Dang cho duyet
              @endif
            </td>
          </tr>
          @endif
          @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
@endsection