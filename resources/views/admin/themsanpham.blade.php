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
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/postThem')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="masanpham" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="tensanpham" placeholder="Enter email">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hãng</label>
                                    <select name="hang" class="form-control" >
                                        @foreach($menu as $me)
                                        <option value="{{$me->id}}">{{$me->mahang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" class="form-control" name="gia" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" class="form-control" name="mota" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" class="form-control" name="manhinh" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAM</label>
                                    <input type="text" class="form-control" name="ram" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PIN</label>
                                    <input type="text" class="form-control" name="pin" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bộ nhớ</label>
                                    <input type="text" class="form-control" name="bonho" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Avatar</label>
                                    <input type="file" id="exampleInputFile" name="avatar">
                                    <p class="help-block">Chọn ảnh đại diện cho sản phẩm.</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh thême</label>
                                    <input type="file" id="exampleInputFile" name="anh1">
                                    <input type="file" id="exampleInputFile" name="anh2">
                                    <input type="file" id="exampleInputFile" name="anh3">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" class="form-control" name="soluong" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
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