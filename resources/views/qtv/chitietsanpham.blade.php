@extends('qtv')
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
                            chi tiết sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="masanpham" value="{{ $sanpham->ma }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="tensanpham" value="{{ $sanpham->ten }}" readonly="">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hãng</label>
                                    <input type="text" class="form-control" name="tensanpham" value="{{ $sanpham->idhang }}"  readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" class="form-control" name="gia"  value="{{ $sanpham->gia }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" class="form-control" name="mota"  value="{{ $sanpham->mota }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" class="form-control" name="manhinh"  value="{{ $sanpham->manhinh }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAM</label>
                                    <input type="text" class="form-control" name="ram"  value="{{ $sanpham->ram }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PIN</label>
                                    <input type="text" class="form-control" name="pin"  value="{{ $sanpham->pin }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bộ nhớ</label>
                                    <input type="text" class="form-control" name="bonho"  value="{{ $sanpham->bonho }}" readonly="">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputFile">Avatar</label>
                                    <img src="../public/frontend/img/product/{{$sanpham->avatar}}" alt="" height="250px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh thêm</label>
                                    <img src="../public/frontend/img/product/{{$sanpham->avatar}}" alt="" height="50px">
                                     <img src="../public/frontend/img/product/{{$sanpham->avatar}}" alt="" height="50px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    
                                    
                                        
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pn->soluong}}" readonly="">
                                
                            
                            </div>
                                <button type="button" class="btn btn-info"><a href="{{ URL::to('qtv/san-pham-cho-duyet') }}">Đóng</a></button>
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