@extends('admin/backend')
@section('tieu_de', 'Danh sách danh mục')

@section('noi_dung')
<div class="right_col" role="main">

    <h3>Danh sách Slide</h3>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($ds as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td><img src="{{asset('images')}}/{{$objRowm->image}}" width="100px"></td>
                            <td>
                                @if ($objRowm->status==1)
                                    <p>Hiển Thị</p>
                                @else
                                    <p>Không Hiển Thị</p>
                                @endif
                            </td>
                            <td >
                            <a href="{{Route('editSlide',['id'=>$objRowm->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{Route('DeleteSlide',['id'=>$objRowm->id])}}"><button class="btn btn-sm btn-danger">Xóa</button>  </a>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

          

</div>

@endsection