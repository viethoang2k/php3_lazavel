<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //phần thêm tài khoản
    public function  register(Request $request){
        $dataView = [ 'errs' => [] ];
        // kiểm tra phương thức nếu là post thì lưu csdl
        if($request->isMethod('post')){
            // là phương thức post
            // kiểm tra hợp lệ dữ liệu
            $rule = [
                'fullname'=>'required|min:1|max:100',
                'username' =>'required',
                'email' =>'required',
                'password' =>'required',
                'confirm_password' =>'required|min:6',
            ];
            $msgE = [
                'fullname.required' =>'Bạn cần nhập họ tên',
                'username.required' =>'Tên tài khoản ít nhất là 5 ký tự',
                'email.required' =>'Email Không được để trống',
                'password.required' =>'Name ít nhất là 6 ký tự',
                'confirm_password.required' =>'Bạn cần nhập lại mật khẩu',
            ];


            $validator = Validator::make( $request->all(), $rule,$msgE );
            if($validator->fails()){
                // có lỗi xảy ra: dữ liệu không hợp lệ
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                // không có lỗi: Lưu CSDL
                $objModel = new User();
                $dataSave = [
                    'username' => $request->get('username'),
                    'password' => Hash::make( $request->get('password')),
                    'email' => $request->get('email'),
                    'fullname' => $request->get('fullname')
                ];
               
                $new_id = $objModel->SaveNew($dataSave);
                return redirect()->route('Auth.Login');
            }
        }
        return view('Auth.register', $dataView);
    }


    public function Login(Request $request)
    {
        $dataView = [ 'errs' => [] ];
        if ($request->isMethod('post')) {
            // Hãy viết lệnh kiểm tra hợp lệ dữ liệu trước khi login nhé....
            // viết lệnh kiểm tra hợp lệ dữ liệu ở đây....
            $rule = [
                'username'=>'required',
                'password'=>'required'// hãy sửa thêm các luật khác để kiểm tra chặt chẽ hơn
            ];
            $msgE = [
                'username.required' =>'Mời bạn nhập tài khoản',
                'password.required' =>'Mời bạn nhập mất khẩu',
            ];
            $validator = Validator::make($request->all(), $rule ,$msgE);

            if($validator->fails()){
                $dataView['errs'] = $validator->errors()->toArray();
            }else{
                //  login
                $dataLogin = [
                    'username' => $request->get('username'),
                    'password' => $request->get('password')
                ];

                if (Auth::attempt($dataLogin)) {
                    // login thanh cong
                    echo "OK dang nhap thanh cong, thong tin user: ";
                    echo '<pre>';
                    print_r(Auth::user());
                    echo '</pre>';
                    // Lấy id tài khoản đã đăng nhập;
                    echo '<br>ID tai khoan = ' . Auth::id();
                    
                    // Chuyển về trang chủ
                    return redirect()->route('home');
                } else {

                    // back() quay lại trang trc
                    // with() là gửi về 1 đoạn text
                    return back()->with('msg','Sai toàn khoản hoặc mật khẩu');
                }
            }
        }

        return view('Auth.Login', $dataView);
    }

    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('Auth.Login');
    }
}