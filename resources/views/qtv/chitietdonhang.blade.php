@extends('qtv')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết đơn hàng
    </div>
    <div class="table-responsive">
        <div style="margin-left: 30px">
        <span>Tên :</span>{{$donhang->ten}}<br>
        <span>Sdt :</span>{{$donhang->sdt}}<br>
        <span>Địa chỉ :</span>{{$donhang->diachi}}<br>
        </div>
        @foreach($chitiet as $c)
        @if($c->trangthai==0)

        <a href="{{URL::to('qtv/xac-nhan-don-hang',$s->id)}}"><button>Xác nhận đơn hàng</button></a>
        @break
        @else 
      
        <p style="color: green;font-size: 20px;text-align: center;">Đơn hàng đã xác nhận</p>
        @break
        @endif
        @endforeach
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Avatar</th>
            <th>Giá</th>
            <th>Số lượng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($chitiet as $chi)
            @foreach($sanpham as $s)
              @if($chi->idsanpham == $s->id)
          <tr>
            <td>{{$s->ten}}</td>
            <td><span class="text-ellipsis"><img src="frontend/img/product/{{$s->avatar}}" alt="" height="70px" width="60px"></span></td>
            <td><span class="text-ellipsis">{{number_format($s->gia,0)}} VNĐ</span></td>
            <td>{{$chi->soluong}}</td>
          </tr>
          @endif
          @endforeach
         @endforeach
        </tbody>
      </table>

    </div>

@endsection