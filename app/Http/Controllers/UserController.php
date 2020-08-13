<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //sửa danh mục
    public function editUser($id, Request $request){
        $dataView = [];
        //1. lấy dữ liệu đưa lên form
        //2. xử lý post: kiểm tra hợp lệ
        $objUser = User::where('id',$id)->first();
        $dataView['objUser'] = $objUser;
        // xử lý post:
        if($request->isMethod('post')){
            $rule = [
                'username'=>'required|min:5|max:100',
                'role' =>'required'
            ];
            $msgE = [
                'username.required' =>'Bạn cần nhập Name',
                'role.min' =>'Name ít nhất là 5 ký tự'
            ];

            $validator = Validator::make($request->all(),$rule,$msgE);
            // kiểm tra
            if($validator->fails()){
                $dataView['err'] = $validator->errors()->toArray();
            }else{
                // ghi DB
                $dataSave = [
                    'username'=> $request->get('username'),
                    'role' => $request->get('role')
                ];

                $objModel = new User();
                $objUser->SaveUpdate($id,$dataSave);
                $dataView['msg'] = 'Kết thúc cập nhật!';
                return redirect()->route('ListUser');
            }
        }
        return view('admin.editUser',$dataView);
    }
  
   //phần hiển thị danh sách danh mục
    public function ListUser(){
        $dataView = [];
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('users')
            ->where('id','>=',1)
            ->orderBy('id','asc');
        // in câu lệnh SQL ra màn hình:
       // echo '<br>'. $query->toSql();

        $bang =  $query->get();
        $dataView['ds'] = $bang;
        return view('admin.ListUser',$dataView);
        $dataView['ds'] = $bang;
        return view('admin.ListUser', $dataView);
    }

    public function DeleteUser($id){
        $oqjModel = new User();
        $oqjModel->dele($id);
        return redirect()->route('ListUser');
    }

}