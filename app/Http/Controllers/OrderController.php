<?php

namespace App\Http\Controllers;
use App\savedit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
   //phần hiển thị danh sách danh mục
    public function ListOrder(){
        $dataView = [];
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('orders')
            ->where('id','>=',0)
            ->orderBy('id','asc');
        // in câu lệnh SQL ra màn hình:
       // echo '<br>'. $query->toSql();

        $bang =  $query->get();
        $dataView['ds'] = $bang;
        return view('admin.ListOrder',$dataView);
        $dataView['ds'] = $bang;
        return view('admin.ListOrder', $dataView);
    }

}