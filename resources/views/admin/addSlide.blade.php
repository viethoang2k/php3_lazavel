@extends('admin/backend')
@section('tieu_de', 'Thêm Slide')

@section('noi_dung')
<div class="right_col" role="main">


            <h3>Thêm Slide</h3>
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
                    <label for=""> Thêm Hình Ảnh:</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status_slide">
                  <option value="1">Banner 1</option>
                  <option  value="2">Banner 2</option>
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