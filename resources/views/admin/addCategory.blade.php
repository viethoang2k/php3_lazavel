@extends('admin/backend')
@section('tieu_de', 'Trang Chủ')

@section('noi_dung')
<div class="right_col" role="main">


            <h3>Trang thêm mới danh mục</h3>
        @foreach($errs as $e)
            <p style="color: red">
            @if(is_array($e))
                {{implode('<br>',$e)}}
                @else
                {{$e}}
            @endif
            </p>
        @endforeach
            <form action="" method="post">
                <div class="form-group">
                    <label for="categories"> Tên danh mục:</label>
                    <input type="text" class="form-control" name="name_cate">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status_cate">
                  <option value="1">Hiển thị</option>
                  <option  value="0">Không hiển thị</option>
                </select>
                </div>
                <div class="form-group">
                        <button class="btn btn-sm btn-primary">Lưu</button>&nbsp;
                        <a href="" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                    @csrf
            </form>
        </div>

@endsection