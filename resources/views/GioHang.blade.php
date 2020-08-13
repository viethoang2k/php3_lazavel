@extends('backend')
@section('tieu_de', 'View Cart')

@section('cart')

<div class="right_col" role="main">
    <br>
    <h3 style="text-align: center">Giỏ Hàng</h3>
    <br>
    <table class="table table-bordered table-dark" style="text-align: center;">
        <thead>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Ảnh Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Đơn Giá</th>
            <th>Thành Tiền</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($listSP as $objRowm)
                        <tr>
                            <td>{{$objRowm->id}}</td>
                            <td>{{$objRowm->name}}</td>
                            <td><img src="{{asset('images')}}/{{$objRowm->image}}" width="60px" alt=""></td>
                            <td>{{$objRowm->name}} </td>
                            <td>$ {{$objRowm->sale_price}}.00</td>
                            <td>$ {{$objRowm->sale_price}}.00</td>
                            <td>
                                <a href="}" class="btn btn-sm btn-primary">Thanh Toán</a>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>

</div>
    <br>
@endsection