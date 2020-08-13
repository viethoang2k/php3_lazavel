@extends('admin/backend')
@section('tieu_de', 'Thêm Sản phẩm')

@section('noi_dung')
<div class="right_col" role="main">


            <h3>Thêm Sản Phẩm</h3>
            @foreach($errs as $e)
            <p style="color: red">
            @if(is_array($e))
                {{implode('<br>',$e)}}
                @else
                {{$e}}
            @endif
            </p>
        @endforeach
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="name"> Tên Sản Phẩm:</label>
                    <input type="text" class="form-control" name="name">
                </div>
            <div class="form-group">
                    <label for="status">Chọn Danh Mục:</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cate_id">
                  <option value="1">Nam</option>
                  <option  value="0">Nữ</option>
                </select>
                </div>
            <div class="form-group">
                    <label for=""> Thêm Hình Ảnh:</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="price"> Price Product:</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="saleprice"> Sale Price:</label>
                    <input type="number" class="form-control" name="sale_price">
                </div>
                <div class="form-group">
                    <label for="detail"> Detail:</label>
                    <input type="text" class="form-control" name="detail">
                </div>  
                <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
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