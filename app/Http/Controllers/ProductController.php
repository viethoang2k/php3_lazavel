<?php

namespace App\Http\Controllers;
use App\SaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    //phần thêmsản phẩm
    public function  addProduct(Request $request){
        $dataSave = [];
        $dataView = [ 'errs' => [] ];
        // kiểm tra phương thức nếu là post thì lưu csdl
        if($request->isMethod('post')){
            // là phương thức post
            // kiểm tra hợp lệ dữ liệu
            $rule = [
                'image' => 'mimes:jpeg,jpg,png,gif|required|min:1|max:10000', // max 10000kb
                'status' =>'required',
                'sale_price' =>'required',
                'name' =>'required',
                'price' =>'required',
                'detail' =>'required',
                'cate_id' =>'required',
            ];
            $msgE = [
                'image.required' =>'Bạn cần chọn ảnh',
                'image.mimes' =>'Bạn cần Chọn đúng định dạng ảnh',
                'status.required' =>'trạng thái không được để trống',
                'sale_price.required' =>'Giá không được để trống',
                'name.required' =>'Name không được để trống',
                'price.required' =>'Giá không được để trống',
                'detail.required' =>'Chi tiết không được để trống',
                'cate_id.required' =>'Chọn danh mục',
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
            $objModel = new SaveProduct();
            $dataSave['status'] = $request->get('status');
            $dataSave['sale_price'] = $request->get('sale_price');
            $dataSave['name'] = $request->get('name');
            $dataSave['price'] = $request->get('price');
            $dataSave['detail'] = $request->get('detail');
            $dataSave['cate_id'] = $request->get('cate_id');
            $new_id = $objModel->SaveNew($dataSave);
            return redirect()->route('ListProduct');

        }
    }
    return view('admin.addProduct',$dataView);
}

    //sửa danh mục
    public function editProduct($id, Request $request){
        $dataView = [ 'errs' => [] ];
        //1. lấy dữ liệu đưa lên form
        //2. xử lý post: kiểm tra hợp lệ
        $objProduct = SaveProduct::where('id',$id)->first();
        $dataView['objProduct'] = $objProduct;
        // xử lý post:
        if($request->isMethod('post')){
            $rule = [
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
                'status' =>'required',
                'sale_price' =>'required',
                'name' =>'required',
                'price' =>'required',
                'detail' =>'required',
                'cate_id' =>'required',
            ];
            $msgE = [
                'image.required' =>'Bạn cần chọn ảnh',
                'image.mimes' =>'Bạn cần Chọn đúng định dạng ảnh',
                'status.required' =>'trạng thái không được để trống',
                'sale_price.required' =>'Giá không được để trống',
                'name.required' =>'Name không được để trống',
                'price.required' =>'Giá không được để trống',
                'detail.required' =>'Chi tiết không được để trống',
                'cate_id.required' =>'Chọn danh mục',
            ];

            $validator = Validator::make( $request->all(), $rule , $msgE );
        if($validator->fails()){
            // có lỗi xảy ra: dữ liệu không hợp lệ
            $dataView['errs'] = $validator->errors()->toArray();
        }else{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $folder = 'images';
                    $image = $file->getClientOriginalName();
                $file->move($folder, $file->getClientOriginalName());
                $image = $file->getClientOriginalName();
                $dataSave = [
                    'image' => $image,
                    'name'=> $request->get('name'),
                    'status' => $request->get('status'),
                    'sale_price' => $request->get('sale_price'),
                    'price' => $request->get('price'),
                    'detail' => $request->get('detail'),
                    'cate_id' => $request->get('cate_id')
                ];
            }

                $objModel = new SaveProduct();
                $objProduct->SaveUpdate($id,$dataSave);
                $dataView['msg'] = 'Kết thúc cập nhật!';
                return redirect()->route('ListProduct');
            }
        }
        return view('admin.editProduct',$dataView);
    }
  
   //phần hiển thị danh sách danh mục
    public function ListProduct(){
        $dataView = [];
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('products')
            ->where('id','>=',1)
            ->orderBy('id','asc');
        // in câu lệnh SQL ra màn hình:
       // echo '<br>'. $query->toSql();

        $bang =  $query->paginate(5);
        $dataView['ds'] = $bang;
        return view('admin.ListProduct',$dataView);
    }

    public function DeleteProduct($id){
        $oqjModel = new SaveProduct();
        $oqjModel->dele($id);
        return redirect()->route('ListProduct');
    }

}