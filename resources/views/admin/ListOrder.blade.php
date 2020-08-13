@extends('admin/backend')
@section('tieu_de', 'Danh sách danh mục')

@section('noi_dung')
<div class="right_col" role="main">

    <h3>Danh sách danh mục</h3>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Date</th>
        </thead>
        <tbody>
            @foreach($ds as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->id_user}}</td>
                            <td>{{$objRowm->name}}</td>
                            <td>{{$objRowm->address}}</td>
                            <td>{{$objRowm->phone_number}}</td>
                            <td>{{$objRowm->email}}</td>
                            <td>{{$objRowm->order_date}}</td>
                            <td>
                            <a href="" class="btn btn-sm btn-primary">Chi tiết hóa đơn</a>
                            <button class="btn btn-sm btn-danger">Xóa</button>  
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

          

</div>

@endsection