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
                           Sửa sản phẩm và chi tiết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/admin/postSua')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$sp->id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="ten" id="exampleInputEmail1" value="{{$sp->ten}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" class="form-control" name="gia" id="exampleInputEmail1" value="{{$sp->gia}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="textarea" class="form-control" name="mota" id="exampleInputEmail1" value ="{{$sp->mota}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" class="form-control" name="manhinh" id="exampleInputEmail1" value="{{$sp->manhinh}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAM</label>
                                    <input type="text" class="form-control" name="ram" id="exampleInputEmail1" value="{{$sp->ram}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PIN</label>
                                    <input type="text" class="form-control" name="pin" id="exampleInputPassword1" value="{{$sp->pin}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bộ nhớ</label>
                                    <input type="text" class="form-control" name="bonho" id="exampleInputEmail1" value="{{$sp->bonho}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Avatar</label>
                                    <img src="../public/frontend/img/product/{{$sp->avatar}}" alt="" height="250px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh thêm</label>
                                    <img src="../public/frontend/img/product/{{$sp->avatar}}" alt="" height="50px">
                                     <img src="../public/frontend/img/product/{{$sp->avatar}}" alt="" height="50px">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="hidden" {{$tong =0}}>
                                    @foreach($pn as $p)
                                        <input type="hidden" {{$tong=$tong+$p->soluong}}>
                                    @endforeach
                                    <input type="number" name="soluong" class="form-control" id="exampleInputEmail1" value="{{$tong}}">
                                </div>
                                <button type="submit" class="btn btn-info suaspham" onclick="testConfirmDialog()">Sửa</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>
        

        


        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		 @endsection