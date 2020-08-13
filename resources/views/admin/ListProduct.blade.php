@extends('admin/backend')
@section('tieu_de', 'Danh sách Sản Phẩm')

@section('noi_dung')
<div class="right_col" role="main">
    <h3>Danh sách sản phẩm</h3>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Cate ID</th>
            <th>Image</th>
            <th>Price</th>
            <th>Sale Price</th>
            <th>Detail</th>
            <th>Rating</th>
            <th>status</th>
        </thead>
        <tbody>
            @foreach($ds as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->name}}</td>
                            <td>@if ($objRowm->cate_id==1)
                                <p>Áo Nam</p>
                            @else
                                <p>Áo Nữ</p>
                            @endif</td>
                            <td><img src="{{asset('images')}}/{{$objRowm->image}}" width="100px"></td>
                            <td>{{$objRowm->price}}</td>
                            <td>{{$objRowm->sale_price}}</td>
                            <td>{{$objRowm->detail}}</td>
                            <td>{{$objRowm->rating}}</td>
                            <td>@if ($objRowm->status==1)
                                <p>Hiển Thị</p>
                            @else
                                <p>Không Hiển Thị</p>
                            @endif</td>
                            <td>
                            <a href="{{Route('editProduct',['id'=>$objRowm->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{Route('DeleteProduct',['id'=>$objRowm->id])}}"><button class="btn btn-sm btn-danger">Xóa</button>  </a>
                            </td>
                        </tr>
                        @endforeach
                        <tr><td>{{$ds->links()}}</td></tr>
        </tbody>
    </table>
</div>

@endsection