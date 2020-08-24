<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Hash;
use Auth;
use App\Http\Controllers\Redirect;
use Mail;
use App\PasswordReset;
session_start();
class FrontendController extends Controller
{
    public function getIndex(){
    	$menu=DB::table('hang')->get();
    	$product=DB::table('sanpham')->orderBy('created_at','DESC')->limit(5)->get();
    	$viewproduct=DB::table('sanpham')->orderBy('view')->where('view','>',0)->limit(8)->get();
    	return view('frontend.index',compact('menu','product','viewproduct'));
    }
    public function lichsu(){
        $menu=DB::table('hang')->get();
        $hoadon=DB::table('hoadon')->where('idnguoidung',Session::get('idnd'))->get();
        return view('frontend.lichsu',compact('menu','hoadon'));
    }
    public function huydon($id){
        DB::table('hoadon')->where('id',$id)->update(['trangthai'=>-1]);
        return redirect()->back();
    }
    public function doithongtin(){
        $menu=DB::table('hang')->get();
        $tk=DB::table('users')->where('id',Session::get('idnd'))->first();
        return view('frontend.thongtin',compact('menu','tk'));
    }
    public function quenmatkhau(){
        $menu=DB::table('hang')->get();
        return view('frontend.quenmatkhau',compact('menu'));
    }
    public function xacnhantoken(){
        $menu=DB::table('hang')->get();
        return view('frontend.xacnnhantoken',compact('menu'));
    }
    public function postToken(Request $req)
    {   
        $menu=DB::table('hang')->get();
        $db=DB::table('users')->where('token',$req->token)->first();
        if($db!=null)
        {   
            $email=$db->email;
            return view('frontend.newpass',compact('menu','email'));
        }
        else
        {
            return redirect('/');
        }
    }
    public function binhluan(Request $req){
        DB::table('binhluan')->insert(['idnguoidung'=>Session::get('idnd'),'idsanpham'=>$req->idsanpham,'binhluan'=>$req->binhluan,'created_at'=>Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()]);
        return redirect()->back();
    }
    public function getSearch(Request $req){
        $menu=DB::table('hang')->get();
        $sp=DB::table('sanpham')->where('ten','like','%'.$req->key.'%')->get();
        return view('frontend.search',compact('sp','menu'));
    }
    public function postQuen(Request $req){
        $email=DB::table('users')->where('email',$req->email)->first();
        if($email){
            $data=['token'=>\Str::random(32)];
            Mail::send('frontend.mailReset',$data, function($message) use($email) {
                $message->from('nguyenhuynh.quynhtuyen@gmail.com', 'Tipe');
                $message->to($email->email, 'Khách hàng')->subject('Reset Password');
            });
            DB::table('users')->where('email',$email->email)->update(['token'=>$data['token']]);
            
            return redirect('/xacnhantoken');
       }else{
            die("Không tồn tại trong hệ thông");
       }


    }
    public function newpass(Request $req)
    {
        DB::table('users')->where('email',$req->email)->update(['password'=>Hash::make($req->password)]);
        return redirect('/');
    }
    public function linkResetToken($token){
        $menu=DB::table('hang')->get();
        $result = Resetpass::where('token', $token)->first();
        return view('frontend.newpasss',compact('menu'));
    }
    public function getCategory($id){
    	$menu=DB::table('hang')->get();
    	$product=DB::table('sanpham')->where('idhang',$id)->paginate(8);
    	return view('frontend.danhmuc',compact('menu','product'));
    }  
    public function getSanpham($id){
    	$menu=DB::table('hang')->get();
    	$product=DB::table('sanpham')->where('id',$id)->first();
        $hinhanh=DB::table('hinhanh')->where('idsanpham',$id)->get();
        $comment=DB::table('binhluan')->where('idsanpham',$id)->get();
        $nguoidung=array();
        foreach($comment as $c){
            $nguoidung[]=DB::table('users')->where('id',$c->idnguoidung)->first();
        }
    	$random=DB::table('sanpham')->inRandomOrder()->limit(6)->get();
        $danhgia=DB::table('rev')->where('idsanpham',1)->avg('danhgia');
    	return view('frontend.product',compact('menu','product','hinhanh','random','danhgia','comment','nguoidung'));
    }
    public function payment(Request $request){
        
        

        foreach (Session::get('cart') as $key => $cart) {
            $request->all();
            $data=array();
            $data['ma']=Carbon::now('Asia/Ho_Chi_Minh')->toDateString() ."-".rand(0,1000);
            $data['idnguoidung']=Session::get('idnguoidung');
            $data['trangthai']=0;
            $data['ship']=$request->shipping;
            $data['ten']=$request->ten;
            $data['sdt']=$request->sdt;
            $data['diachi']=$request->diachi;
            $data['created_at']=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $hd_id=DB::table('hoadon')->insertGetId($data);
            $chitiet=array();
            $chitiet['idhoadon']=$hd_id;
            $chitiet['idnguoiban']=$cart['product_nguoiban'];
            $chitiet['idsanpham']=$cart['product_id'];
            $chitiet['soluong']=$cart['product_qty'];
            $chitiet['trangthai']=0;
            $chitiet['created_at']=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $nhap=DB::table('chitietphieunhap')->where('idsanpham',$cart['product_id'])->first();
            DB::table('sanpham')->where('id',$cart['product_id'])->update(['conlai'=>$nhap->soluong-$cart['product_qty']]);
            DB::table('chitiethoadon')->insert($chitiet);
        }       
        $email=DB::table('users')->where('id',Session::get('idnguoidung'))->first();
                $m=$email->email;
                Mail::send('frontend.maildathang',Session::get('cart'),function($message) use($m){
                    $message->from('nguyenhuynh.quynhtuyen@gmail.com','Tipe');
                    $message->to($m);
                    $message->subject('Đặt hàng thành công');
                });
        Session::put('dhthanhcong',1);
        Session::forget('cart');
        return redirect('/');
    }
    public function search($key)
    {
        
    }
    public function getLienhe(){
        $menu=DB::table('hang')->get();
        return view('frontend.lienhe',compact('menu'));
    }
    public function deleteAll(){
        $cart=Session::get('cart');
        if($cart==true){
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCart()
    {
        $menu=DB::table('hang')->get();
        $random=DB::table('sanpham')->inRandomOrder()->limit(4)->get();
        $sanpham=array();
        foreach (Session::get('cart') as $key => $cart) {
            $sanpham[]=DB::table('sanpham')->where('id',$cart['product_id'])->first();
        }
        return view('frontend.cart',compact('menu','random','sanpham'));
    }
    public function getCheckout(){
        $nguoidung=DB::table('users')->where('email',Session::get('email'))->first();
        Session::put('idnguoidung',$nguoidung->id);
        $menu=DB::table('hang')->get();
        $tt=DB::table('diachi')->where('idnguoidung',$nguoidung->id)->get();
        return view('frontend.checkout',compact('menu','tt','nguoidung'));
    }
     public function getLogin(){
        Session::flush();
        $menu=DB::table('hang')->get();
        return view('frontend.login',compact('menu'));
    }
    public function postLogin(Request $req){
        
        $data=array();
        $data['email']=$req->email;
        $data['password']=$req->password;
        if(Auth::attempt($data)){
            Session::put('email',$req->email);
            $nd=DB::table('users')->where('email',$req->email)->first();
            Session::put('nd',$nd->tenshop);
            Session::put('idnd',$nd->id);
            Session::put('checkdn',1);
            return redirect('/');}
        else
        {   
            Session::put('dnthatbai','Đăng nhập thất bại');
            return redirect()->back();
        }


    }
    public function logout(){
        Auth::logout();
        Session::forget('email');
        Session::forget('nd');
        return redirect()->back();
    }
     public function getRegister(){
        if(Session::has('dnthatbai')){
            $menu=DB::table('hang')->get();
            return view('frontend.register',compact('menu'));
        }
        
        $menu=DB::table('hang')->get();
            return view('frontend.register',compact('menu')); 
    }
    public function postRegister(Request $req){
        if($req->email !=null && $req->password !=null && $req->ten !=null && $req->sdt !=null && $req->diachi!=null)
        {
            
            $ten=DB::table('users')->where('email',$req->email)->first();
            if($ten!=null){
                if($ten->email == $req->email)
                {
                    echo "Tên đăng nhập đã có";
                }
                
            }
            else {
                $nguoidung=array();
                $nguoidung['email']=$req->email;
                $nguoidung['password']=Hash::make($req->password);
                $nguoidung['ten']=$req->ten;
                $nguoidung['sdt']=$req->sdt;
                $nguoidung['diachi']=$req->diachi;
                $nguoidung['created_at']=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();

                
                Session::put('dki','Đăng kí thành công');
                $email=$req->email;
                $data=[
                    'ten'=>$req->ten,
                    'email'=>$req->email
                ];
                Mail::send('frontend.dki',$data,function($message) use($email){
                    $message->from('nguyenhuynh.quynhtuyen@gmail.com','Tipe');
                    $message->to($email);
                    $message->subject('Đăng kí thành công');
                });
                DB::table('users')->insert($nguoidung);
                return redirect()->back();

            }

       }
       else {
            Session::put('error','Đăng kí thất bại');
            return redirect()->back()->with('');
       }
       

    }
    public function themyt($id)
    {
        if(Session::has('idnd')){
            $data=array();
            $data['idnguoidung']=Session::get('idnd');
            $data['idsanpham']=$id;
            DB::table('danhsachyeuthich')->insert($data);
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function yeuthich()
    {
        $menu=DB::table('hang')->get();
        $yeuthich=DB::table('danhsachyeuthich')->where('idnguoidung',Session::get('idnd'))->get();
        $sp=array();
        foreach ($yeuthich as $key) {
            $sp[]=DB::table('sanpham')->where('id',$key->idsanpham)->first();
        }
        
        return view('frontend.yeuthich',compact('menu','sp'));
    }
    public function locSanpham(){
        
    }
     public function getAll(){
        $menu=DB::table('hang')->get();
        $product=DB::table('sanpham')->get();
        return view('frontend.all',compact('menu','product'));
    }
     public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                'product_nguoiban' => $data['cart_product_nguoiban'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                'product_nguoiban' => $data['cart_product_nguoiban'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }  
    public function deleteCart($session_id)
    {
        $cart=Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$value){
                if($value['session_id']==$session_id)
                    unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function update_cart(Request $req){
        $data=$req->all();
        $cart=Session::get('cart');
        if($cart==true)
        {
            foreach ($data as $key => $qty) {
                foreach ($cart as $session => $value) {
                    if($value['session_id']==$key)
                        $cart[$session]['product_qty']=$qty;
                }
            }
        }
        Session::put('cart',$cart);
        return redirect()->back();  
    }

}
