<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Collection;
session_start();

class AdminController extends Controller
{
   public function basic(){
    if(Session::has('idban')){
   	return view('admin.index');}
    else
    {
      return view('admin.login');
    }
   }
   public function getLogin(){
   	return view('admin.login');
   }
   public function logout(){
    Auth::logout();
    Session::flush();
    return redirect('admin/dashboard');
   }
   public function postLogin(Request $req){
        $data=array();
        $data['email']=$req->email;
        $data['password']=$req->password;
        if(Auth::attempt($data)){
            Session::put('email',$req->email);
            $nd=DB::table('users')->where('email',$req->email)->first();
            Session::put('nd',$nd->tenshop);
            Session::put('idban',$nd->id);
            Session::put('checkdn',1);
            return view('admin.index');}
        else
        {   
            Session::put('dnthatbai','Đăng nhập thất bại');
            return redirect()->back();
        }
   }
   public function postSua(Request $req)
   {
      DB::table('sanpham')->where('id',$req->id)->update(['ten'=>$req->ten],['gia'=>$req->gia],['mota'=>$req->mota],['manhinh'=>$req->manhinh],['ram'=>$req->ram],['pin'=>$req->pin],['bonho'=>$req->bonho],['soluong'=>$req->soluong]);
      return redirect()->back();

   }
   public function postXoa($id)
   {

      $kt=DB::table('chitiethoadon')->where('idsanpham',$id)->first();
      if($kt==null){
          DB::table('phieunhap')->where('idsanpham',$id)->delete();
          DB::table('sanpham')->where('id',$id)->delete();
          Session::put('okxoa',1);
          return redirect()->back();
      }
      else {
          Session::put('loixoa',1);
        return redirect()->back();
        
      }

   }
   public function thongke(){
      $year=Carbon::now()->year;
      return view('admin.thongke',compact('year'));
   }
   public function getList(){
      $danhsach=DB::table('sanpham')->where('idnguoidung',Session::get('idban'))->where('tinhtrang',1)->paginate(8);
      
   	return view('admin.danhsachsanpham',compact('danhsach'));
   }
   
   public function themSanPham(){
      $menu=DB::table('hang')->get();
   	return view('admin.themsanpham',compact('menu'));
   }
   public function duyetSanPham(){
      $sanpham=DB::table('sanpham')->where('idnguoidung',Session::get('idban'))->where('tinhtrang',0)->get();
      $pn=array();
      foreach ($sanpham as $key) {
        $pn[]=DB::table('phieunhap')->where('idsanpham',$key->id)->first();
        
     }
    
   	return view('admin.duyetsanpham',compact('sanpham','pn'));
   }
   
   public function postThongKe(Request $req)
   {
    
    if($req->thang!="null" and $req->nam!="null"){

      $cthd=DB::table('chitiethoadon')->where('idnguoiban',Session::get('idban'))->get();
      $ma=array();
       $thang;
       $nam;
      foreach($cthd as $ct){
       $thang=substr($ct->created_at,5,2);
        $nam=substr($ct->created_at,0,4);
        if($thang == $req->thang and $nam == $req->nam)
          $ma[]=$ct;
      }
      $hoadon=array();
      foreach ($ma as $key) {
        $hoadon[]=DB::table('hoadon')->where('id',$key->idhoadon)->first();
      }
      return view('admin.newthongke',compact('ma','hoadon'));
    }
    else
    {
      Session::put('loithoigian',1);
      return redirect()->back();
    }
      
   }
   public function suaSanPham($id){
      $sp=DB::table('sanpham')->where('id',$id)->first();
      $pn=DB::table('phieunhap')->where('idsanpham',$sp->id)->get();
      return view('admin.suasanpham',compact('sp','pn'));
   }
   public function postThem(Request $req){
      $sanpham=array();
      $sanpham['ma']=$req->masanpham;
      $sanpham['ten']=$req->tensanpham;
      $sanpham['gia']=$req->gia;
      $sanpham['mota']=$req->mota;
      $sanpham['manhinh']=$req->manhinh;
      $sanpham['ram']=$req->ram;
      $sanpham['pin']=$req->pin;
      $sanpham['bonho']=$req->bonho;
      $sanpham['idnguoidung']=Session::get('idban');
      $sanpham['idhang']=$req->hang;
      $sanpham['tinhtrang']=0;
      $sanpham['view']=0;
      $sanpham['created_at']=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
      if($req->hasFile('avatar')){
               $file=$req->file('avatar');
               $sanpham['avatar']=$file->getClientOriginalName('avatar');
               $file->move('frontend/img/product',$sanpham['avatar']);
      }

     $idsanpham=DB::table('sanpham')->insertGetId($sanpham);
     
     $nhap_id=DB::table('phieunhap')->insert(['idnguoidung'=>Session::get('idban')]);
     DB::table('chitietphieunhap')->insert(['idphieunhap'=>$nhap_id,'idsanpham'=>$idsanpham,'soluong'=>$req->soluong,'created_at'=>Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()]);
     return redirect()->back()->with('message','Thêm thành công');
   }

}
