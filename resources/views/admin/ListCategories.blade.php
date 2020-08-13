@extends('admin/backend')
@section('tieu_de', 'Danh sách danh mục')

@section('noi_dung')
<div class="right_col" role="main">

    <h3>Danh sách danh mục</h3>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>status</th>
            
        </thead>
        <tbody>
            @foreach($ds as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->name}}</td>
                            <td>{{$objRowm->status}}</td>
                            <td>
                            <a href="{{Route('editCategory',['id'=>$objRowm->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{Route('DeleteCategory',['id'=>$objRowm->id])}}"><button class="btn btn-sm btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

          

</div>

@endsection