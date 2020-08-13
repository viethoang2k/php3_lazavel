@extends('admin/backend')
@section('tieu_de', 'Sửa slide')

@section('noi_dung')
<div class="right_col" role="main">


            <h3>Trang Sửa Slide</h3>
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
            @csrf
            <div class="form-group">
                    <label for=""> Thêm Hình Ảnh:</label>
                    <input type="file" name="image" value="{{$objSlide->image}}">
                    <br>
                    <img src="{{asset('images')}}/{{$objSlide->image}}" width="200px">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status_slide" value="{{$objSlide->status}}">
                  <option value="1">Banner 1</option>
                  <option  value="2">Banner 2</option>
                </select>
                </div>
                <div class="form-group">
                        <button class="btn btn-sm btn-primary">Lưu</button>&nbsp;
                        <a href="{{route('ListSlide')}}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
            </form>
        </div>

@endsection