<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class QuanTriController extends Controller
{
    public function index(){
        if(Session::has('admin'))
    	   return view('qtv.index');
        else
            return view('qtv.login');
    }
    public function login(){
        return view('qtv.login');
    }
    public function postLogin(Request $req){

        $admin=DB::table('admin')->first();
        if($req->admin==$admin->username)
        {
            if($req->pass == $admin->password)
            {
                Session::put('admin',1);
                return view('qtv.index');
            }
        }
        return view('qtv.login');
    }
    public function getDanhSachShop(){
    	$shop=DB::table('users')->where('dangkishop',1)->paginate(10);
    	return view('qtv.danhsachshop',compact('shop'));
    	
    }
    public function getDanhSachThanhVien(){
    	$thanhvien=DB::table('users')->paginate(20);
    	return view('qtv.danhsachthanhvien',compact('thanhvien'));
    }
    public function getDuyetShop(){
    	$shop=DB::table('users')->where('dangkishop',0)->paginate(10);
    	return view('qtv.danhsachduyetshop',compact('shop'));
    }
    public function getDanhSachChoDuyet(){
    	$sanpham=DB::table('sanpham')->where('tinhtrang',0)->paginate(10);
    	$nhap=DB::table('phieunhap')->get();
    	$nguoidung=array();
    	foreach($sanpham as $s){
    		$nguoidung[]=DB::table('users')->where('id',$s->idnguoidung)->first();
    	}

    	return view('qtv.sanphamchoduyet',compact('sanpham','nguoidung','nhap'));
    }
    public function quaylai(){
        return redirect()->back();
    }
    public function getBinhLuanChoDuyet(){
    	$bl=DB::table('binhluan')->where('trangthai',0)->get();
    	$nguoidung=array();
    	$sanpham=array();
    	foreach($bl as $b)
    	{
    		$nguoidung[]=DB::table('users')->where('id',$b->idnguoidung)->first();
    		$sanpham[]=DB::table('sanpham')->where('id',$b->idsanpham)->first();
    	}
    	return view('qtv.binhluanchoduyet',compact('bl','nguoidung','sanpham'))	;
    }
    public function getDSDH(){
        $donhang=DB::table('hoadon')->paginate(10);
        return view('qtv.danhsachdonhang',compact('donhang'));
    }
    public function getDonHang(){
    	$donhang=DB::table('hoadon')->where('trangthai',0)->paginate(10);
    	return view('qtv.donhang',compact('donhang'));
    }
    public function xacnhandon($id){
        DB::table('hoadon')->where('id',$id)->update(['trangthai'=>1]);
        return redirect()->back(); 
    }
    public function duyetshop($id){
        $duyet=DB::table('users')->where('id',$id)->update(['dangkishop'=>1]);
        return redirect()->back();
    }
    public function chitiet($id){
        $menu=DB::table('hang')->get(); 
        $sanpham=DB::table('sanpham')->where('id',$id)->first();
        $pn=DB::table('chitietphieunhap')->where('idsanpham',$sanpham->id)->first();
        return view('qtv.chitietsanpham',compact('menu','sanpham','pn'));

    }
    public function chitietdonhang($id){
        $donhang=DB::table('hoadon')->where('id',$id)->first();
        $chitiet=DB::table('chitiethoadon')->where('idhoadon',$donhang->id)->get();
        $sanpham=array();
        foreach($chitiet as $c)
        {
            $sanpham[]=DB::table('sanpham')->where('id',$c->idsanpham)->first();
        }
        return view('qtv.chitietdonhang',compact('chitiet','donhang','sanpham'));
    }
    public function logout(){
        Session::flush();
        return redirect('qtv/dashboard');
    }
    public function duyetsp($id){
        $duyet=DB::table('sanpham')->where('id',$id)->update(['tinhtrang'=>1]);
        return redirect()->back();
    }
    public function khongduyet($id){
        $duyet=DB::table('sanpham')->where('id',$id)->update(['tinhtrang'=>-1]);
        return redirect()->back();
    }
}
