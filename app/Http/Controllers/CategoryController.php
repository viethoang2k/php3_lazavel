<?php

namespace App\Http\Controllers;
use App\savedit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // phần admin

    public function index()
    { 
        return view('admin.index');
    }


    //phần thêm danh mục
    public function  addCategory(Request $request){
        // kiểm tra phương thức nếu là post thì lưu csdl
        $dataView = [ 'errs' => [] ];
        if($request->isMethod('post')){
            // là phương thức post
            // kiểm tra hợp lệ dữ liệu
            $rule = [
                'name_cate'=>'required|min:1|max:100',
                'status_cate' =>'required'
            ];
            $msgE = [
                'name_cate.required' =>'Bạn cần nhập Name',
                'status_cate.min' =>'Name ít nhất là 1 ký tự'
            ];


            $validator = Validator::make( $request->all(), $rule,$msgE );
            if($validator->fails()){
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                // không có lỗi: Lưu CSDL
                $objModel = new savedit();
                $dataSave = [];
                $dataSave['name'] = $request->get('name_cate');
                $dataSave['status'] = $request->get('status_cate');
                $new_id = $objModel->SaveNew($dataSave);
                return redirect()->route('ListCategories');
            }
        }
        return view('admin.addCategory' , $dataView);
    }

    //sửa danh mục
    public function editCategory($id, Request $request){
        
        $dataView = [ 'errs' => [] ];
        //1. lấy dữ liệu đưa lên form
        //2. xử lý post: kiểm tra hợp lệ
        $objCate = savedit::where('id',$id)->first();
        $dataView['objCate'] = $objCate;
        // xử lý post:
        if($request->isMethod('post')){
            $rule = [
                'name_cate'=>'required|min:1|max:100',
                'status_cate' =>'required'
            ];
            $msgE = [
                'name_cate.required' =>'Name không được để trống',
                'status_cate.min' =>'Name ít nhất là 5 ký tự'
            ];

            $validator = Validator::make($request->all(),$rule,$msgE);
            // kiểm tra
            if($validator->fails()){
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                // ghi DB
                $dataSave = [
                    'name'=> $request->get('name_cate'),
                    'status' => $request->get('status_cate')
                ];

                $objModel = new savedit();
                $objCate->SaveUpdate($id,$dataSave);
                $dataView['msg'] = 'Kết thúc cập nhật!';
                return redirect()->route('ListCategories');
            }
        }
        return view('admin.editCategory',$dataView);
    }
  
   //phần hiển thị danh sách danh mục
    public function ListCategories(){
        $dataView = [];
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('categories')
            ->where('id','>=',1)
            ->orderBy('id','asc');
        // in câu lệnh SQL ra màn hình:
       // echo '<br>'. $query->toSql();

        $bang =  $query->get();
        $dataView['ds'] = $bang;
        return view('admin.ListCategories',$dataView);
        $dataView['ds'] = $bang;
        return view('admin.ListCategories', $dataView);
    }
    public function DeleteCategory($id){
        $oqjModel = new savedit();
        $oqjModel->dele($id);
        return redirect()->route('ListCategories');
    }

}