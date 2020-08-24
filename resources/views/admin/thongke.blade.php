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
                            Chọn thời gian muốn thống kê
                        </header>
                        <form action="{{URL::to('/admin/postThongKe')}}" method="post">
                        	@csrf
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Tháng</label>
                                    <select name="thang"  >
                                    	<option value="null">Tháng</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="19">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <label for="exampleInputEmail1">Năm</label>
                                    <select name="nam"  >
                                        <option value="null">Năm</option>
                                    	@for($i=2010;$i<=$year;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                 <button type="submit" class="btn btn-info">Gữi</button>
                             </form>
                    </section>

            </div>
          
        </div>
        

        


        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		 @endsection