@extends('admin/backend')
@section('tieu_de', 'Danh sách danh mục')

@section('noi_dung')
<div class="right_col" role="main">


            <h3>Trang Sửa Tài Khoản</h3>
            <form action="" method="post">
            @csrf
                <div class="form-group">
                    <label for="categories"> Tên Tài Khoản:</label>
                    <input type="text" class="form-control" name="username"  value="{{$objUser->username}}">
                </div>
                <div class="form-group">
                    <label for="role">Trạng thái:</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="role"  value="{{$objUser->role}}">
                  <option value="1">Thành Viên</option>
                  <option  value="0">Quản Trị</option>
                </select>
                </div>
                <div class="form-group">
                        <button class="btn btn-sm btn-primary">Lưu</button>&nbsp;
                        <a href="{{route('ListUser')}}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
            </form>
        </div>

@endsection