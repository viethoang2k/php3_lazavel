<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{
    //
    public function AddCart($id){

        if(Session::has('cart')){
            // đã mua sản phẩm nào đó rồi
            $cart = Session::get('cart');
            if(isset($cart[$id]))
                $cart[$id] ++;  // đã mua sản phẩm $id rồi, tăng số lượng
            else
                $cart[$id] = 1; // chưa mua sản phẩm hiện tại

            Session::put('cart',$cart);
        }else{
            // chưa mua,
            Session::put('cart',[$id=>1]);
        }
        return redirect()->route('home');
    }

    public function GioHang(){


        if (!Session::has('cart') || empty(Session::get('cart'))) {
            // chưa khởi tạo giỏ hàng hoặc giỏ hàng rỗng
            // hãy chuyển về trang danh sách sản phẩm hoặc hiển thị thông báo gì đó...
            return redirect()->route('home');
        }
        // echo '<pre>';
        // print_r(Session::all() ['cart']);

        $cart = Session::get('cart');
        $mang_id = array_keys($cart);

        // echo '<hr> Mảng ID';
        // print_r($mang_id);

        // lấy ds sản phẩm trong giỏ hàng
        $listSP = DB::table('products')
            ->whereIn('id',$mang_id)
            ->get();
        // truyền cái $listSP ra view
       
        return view('GioHang' , compact('listSP'));
        //lệnh hủy session khi gửi xong đơn hàng:
//        Session::remove('cart');
    }


}