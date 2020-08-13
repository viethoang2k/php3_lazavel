@extends('backend')
@section('tieu_de', 'View Cart')

@section('cart')

    <br>
    giỏ hàng
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>Id</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
        </thead>
        <tbody>
            @foreach($listSP as $objRowm)
                
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->id_order}}</td>
                            <td>{{$objRowm->id_product}}</td>
                            <td>{{$objRowm->quantity_product}}</td>
                            <td>{{$objRowm->payment_price}}</td>
                            <td>
                            <a href="" class="btn btn-sm btn-primary">Chi tiết hóa đơn</a>
                            <button class="btn btn-sm btn-danger">Xóa</button>  
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

    <br>
    
@endsection