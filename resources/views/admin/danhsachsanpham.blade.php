@extends('adminmaster')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      SẢN PHẨM ĐANG BÁN
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Avatar</th>
            <th>Giá</th>
            <th>Mô tả</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsach as $ds)
          <tr>
           
            <td>{{$ds->ten}}</td>
            <td><span class="text-ellipsis"><img src="frontend/img/product/{{$ds->avatar}}" alt="" height="70px" width="60px"></span></td>
            <td><span class="text-ellipsis">{{number_format($ds->gia,0)}} VNĐ</span></td>
            <td>{{$ds->mota}}</td>
            <td>
              <a href="{{URL::to('/admin/sua-sanpham',$ds->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a><a href="{{URL::to('/admin/postXoa',$ds->id)}}" onclick="xoasanpham()" ><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
         {{$danhsach->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		@endsection