@extends('backend')
@section('tieu_de', 'Man')

@section('man')

        <!-- Start Popular Products Section -->
<section class="popular-products">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="title text-center">
                	<h4>Áo Nam</h4>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-12">
				<div class="products-slider4 same-nav owl-carousel owl-theme" data-margin="30" data-dots="false" data-nav="true">
                    @foreach ($product_man as $item)
                    <div class="item">
                            <div class="product-box common-cart-box">
                                <div class="product-img common-cart-img">
                                    <img src="{{asset('images')}}/{{$item->image}}" alt="product-img">
                                    <div class="hover-option">
                                        <div class="add-cart-btn">
                                            <a href="{{route('AddCart',['id'=>$item->id])}}" class="btn btn-primary">Add To Cart</a>
                                        </div>
                                        <ul class="hover-icon">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#test-popup3" class="quickview-popup-link"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info common-cart-info text-center">
                                    <a href="{{Route('singleproduct',['id'=>$item->id])}}" class="cart-name">{{$item->name}}</a>
                                    <p class="cart-price"><del>$ {{$item->price}}.00</del>$ {{$item->sale_price}}.00</p>
                                </div>
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular Products Section -->
@endsection