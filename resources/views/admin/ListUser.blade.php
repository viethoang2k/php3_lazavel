@extends('admin/backend')
@section('tieu_de', 'Danh sách danh mục')

@section('noi_dung')
<div class="right_col" role="main">

    <h3>Danh sách danh mục</h3>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>FullName</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Phân Quyền</th>
        </thead>
        <tbody>
            @foreach($ds as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->fullname}}</td>
                            <td>{{$objRowm->username}}</td>
                            <td>{{$objRowm->email}}</td>
                           <td> @if ($objRowm->role==0)
                            <p>Quản Trị</p>
                        @else
                        <p>Thành Viên</p>
                        @endif</td>
                            <td>
                            <a href="{{Route('editUser',['id'=>$objRowm->id])}}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{Route('DeleteUser',['id'=>$objRowm->id])}}" ><button class="btn btn-sm btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

          

</div>

@endsection