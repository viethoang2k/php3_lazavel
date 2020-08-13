<?php

namespace App\Http\Controllers;
use App\SaveSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{

    //phần thêmsản phẩm
        public function  addSlide(Request $request){
        $dataView = [ 'errs' => [] ];
        $dataSave = [];
            // kiểm tra phương thức nếu là post thì lưu csdl
            if($request->isMethod('post')){
                // là phương thức post
                // kiểm tra hợp lệ dữ liệu
                $rule = [
                    'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
                    'status_slide' =>'required'
                ];
                $msgE = [
                'image.required' =>'Bạn cần chọn ảnh',
                'image.mimes' =>'Bạn cần chọn đúng định dạng',
                'status_slide.required' =>'Không được để trống'
                ];
             
            $validator = Validator::make( $request->all(), $rule , $msgE );
            if($validator->fails()){
                // có lỗi xảy ra: dữ liệu không hợp lệ
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $folder = 'images';
                    $file->move($folder, $file->getClientOriginalName());
                    $dataSave['image'] = $file->getClientOriginalName();
                }
                // không có lỗi: Lưu CSDL
                $objModel = new SaveSlide();
                $dataSave['status'] = $request->get('status_slide');
                $new_id = $objModel->SaveNew($dataSave);
                return redirect()->route('ListSlide');

            }
        }
        return view('admin.addSlide', $dataView);
    }

    //sửa danh mục
    public function editSlide($id, Request $request){
        $dataView = [ 'errs' => [] ];
        //1. lấy dữ liệu đưa lên form
        //2. xử lý post: kiểm tra hợp lệ
        $objSlide = SaveSlide::where('id',$id)->first();
        $dataView['objSlide'] = $objSlide;
        // xử lý post:
        if($request->isMethod('post')){
            $rule = [
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
                'status_slide' =>'required'
            ];
            $msgE = [
                'image.required' =>'Bạn cần chọn ảnh',
                'image.mimes' =>'Bạn cần chọn đúng định dạng',
                'status_slide.required' =>'Không được để trống'
            ];

            $validator = Validator::make($request->all(),$rule,$msgE);
            // kiểm tra
            if($validator->fails()){
                // có lỗi xảy ra: dữ liệu không hợp lệ
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $folder = 'images';
                    $file->move($folder, $file->getClientOriginalName());
                    $image = $file->getClientOriginalName();
                    $dataSave = [
                    'image' => $image,
                    'status' => $request->get('status_slide'),
                    ];
                }

                $objModel = new SaveSlide();
                $objSlide->SaveUpdate($id,$dataSave);
                $dataView['msg'] = 'Kết thúc cập nhật!';
                return redirect()->route('ListSlide');
            }
        }
        return view('admin.editSlide',$dataView);
    }
  
   //phần hiển thị danh sách danh mục
    public function ListSlide(){
        $dataView = [];
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('sliders')
            ->where('id','>=',0)
            ->orderBy('id','asc');
        // in câu lệnh SQL ra màn hình:
       // echo '<br>'. $query->toSql();

        $bang =  $query->get();
        $dataView['ds'] = $bang;
        return view('admin.ListSlide',$dataView);
        $dataView['ds'] = $bang;
        return view('admin.ListSlide', $dataView);
    }

    public function DeleteSlide($id){
        $oqjModel = new SaveSlide();
        $oqjModel->dele($id);
        return redirect()->route('ListSlide');
    }
}