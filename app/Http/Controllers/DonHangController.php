<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class DonHangController extends Controller
{
    
    public function getList(){
        
    	$chitiet=DB::table('chitiethoadon')->where('idnguoiban',Session::get('idban'))->select('idhoadon')->where('trangthai',0)->distinct()->get();
        $donhang=array();
        foreach($chitiet as $c){
        $donhang[]=DB::table('hoadon')->where('id',$c->idhoadon)->where('trangthai',1)->first();
    }
        $ct=array();
        foreach ($chitiet as $key ) {
             $ct[]=DB::table('chitiethoadon')->where('idhoadon',$key->idhoadon)->first();
         } 
         
    	return view('admin.donhang',compact('donhang','ct','chitiet'));
    }
    public function chiTietDonHang($id){
    	$chitiet=DB::table('chitiethoadon')->where('idhoadon',$id)->get();
    	$donhang=DB::table('hoadon')->where('id',$id)->first();
        $sanpham=array();
        foreach($chitiet as $c)
        {
            $sanpham[]=DB::table('sanpham')->where('id',$c->idsanpham)->first();
        }
        
    	return view('admin.chitietdonhang',compact('chitiet','donhang','sanpham'));
    }
    public function xacnhan(Request $req){
      DB::table('chitiethoadon')->where('idhoadon',$req->id)->update(['trangthai'=>1]);
      return redirect()->back();

   }
   public function listdonhang(){
        $chitiet=DB::table('chitiethoadon')->where('idnguoiban',Session::get('idban'))->select('idhoadon')->where('trangthai',1)->distinct()->get();
        $donhang=array();
        foreach($chitiet as $c){
            $donhang[]=DB::table('hoadon')->where('id',$c->idhoadon)->first();
        }
        $ct=array();
        foreach ($chitiet as $key ) {
            $ct[]=DB::table('chitiethoadon')->where('idhoadon',$key->idhoadon)->first();
        } 
        return view('admin.listdonhang',compact('donhang','ct','chitiet'));
   }
}
