@extends('qtv')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SACH SHOP
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên shop</th>
            <th>Avatar</th>
            <th></th>
            
           
          </tr>
        </thead>
        <tbody>
          @foreach($shop as $s)
          <tr>
            <td>{{$s->tenshop}}</td>
            <td><span class="text-ellipsis"><img src="admin/images/{{$s->avatar}}" alt="" height="70px" width="60px"></span></td>
           <td>
             <a href=" {{ URL::to('qtv/duyetshop',$s->id) }}"> <i class="fa fa-check text-success text-active"></i> </a>   </p><i class="fa fa-times text-danger text"></i>
            </td>
          </tr>
@endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
         {{$shop->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
    @endsection