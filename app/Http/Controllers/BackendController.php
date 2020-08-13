<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_Attachment;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //phần giao diện

    //phần trang  chủ
    public function home()
    { 
        $dataView = [];
            // lấy danh sách bài viết với điều kiện id >=2
            $slide = DB::table('sliders')
                ->where('status',1)
                ->orderBy('id','asc')
                ->limit(3)
                ->get();
            
            $product = DB::table('products')
                ->where('status',1)
                ->orderBy('id','asc')
                ->limit(8)
                ->get();

            $product_rating = DB::table('products')
                ->where('status',1)
                ->where('rating', '>=' , 3)
                ->orderBy('id','asc')
                ->limit(8)
                ->get();
            // in câu lệnh SQL ra màn hình:
           // echo '<br>'. $query->toSql();
    
            return view('home',compact('slide' , 'product' , 'product_rating'));
    }

    //Phần tìm kiếm 
    public function timkiem(request $request)
    { 
        $keyword = $request->keyword;
        $products = DB::table('products')
                ->where('name', 'like' , "%$keyword%")
                ->paginate(12);
                // dd($products);
        return view('timkiem', compact('keyword' , 'products'));
    }

    public function man()
    { 
        $product_man = DB::table('products')
                ->where('cate_id',1)
                ->orderBy('id','asc')
                ->limit(8)
                ->get();
                return view('man' , compact('product_man'));
    }
    public function woman()
    { 
        $product_woman = DB::table('products')
                ->where('cate_id',0)
                ->orderBy('id','asc')
                ->limit(8)
                ->get();
                return view('woman' , compact('product_woman'));
    }
    public function cart()
    { 
        return view('cart');
    }
    public function singleproduct($id)
    { 
        $product = DB::table('products')
                ->where('id' , $id)
                ->first();
        $related_product = DB::table('products')
                ->where('cate_id', $product->cate_id)
                ->get();
        return view('singleproduct' ,compact( 'product', 'related_product'));
    }

    // phần gửi mail
    public function contact()
    { 
        Mail::send([], [], 
        
        function ($message) {
            $swiftAttachment = Swift_Attachment::fromPath('updoads/del.png');
            $message->to('nguenviethoang@2000.com', 'Hoàng Xô')
            ->from('hoangnvph07888@fpt.edu.vn', 'Admin')
            ->setBody('nội dung mail', 'text/html')
            ->attach($swiftAttachment)
            ->setSubject('Tiêu Đề Email');
           
        }); dd('contact');
        return view('contact');
    }
    public function myaccount()
    { 
        return view('myaccount');
    }
}
