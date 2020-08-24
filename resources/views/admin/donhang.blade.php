@extends('adminmaster')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách đơn hàng
    </div>
    <div>
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
            <th>Mã đơn hàng</th>
            <th>Tên người đặt</th>
            <th data-breakpoints="xs">Điện thoại </th>
            <th>Địa chỉ nhận hàng</th>
            <th>Trạng thái</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          
          @foreach($donhang as $dh)
          @if($dh!=null)
          <tr data-expanded="true">
            <td>{{$dh->ma}}</td>
            <td>{{$dh->ten}}</td>
            <td>{{$dh->sdt}}</td>
            <td>{{$dh->diachi}}</td>
            <td>
              @foreach($ct as $c)
              @if($c->trangthai==0)
                Chưa xác nhận
                @break
                @else 
                Đã xác nhận
                @break
                @endif
                @endforeach
            </td>
            <td><a href="{{URL::to('/admin/chi-tiet',$dh->id)}}">Chi tiết</a></td>
          </tr>
          @else 
         <p style="font-size: 20px;color: red"> Không có đơn hàng mới</p>
         @endif
         @endforeach
         
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection