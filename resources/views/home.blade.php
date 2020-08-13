@extends('backend')
@section('tieu_de', 'Home')

@section('home')



<!-- Start Popular Products Section -->
<section class="popular-products">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="title text-center">
                	<h4>SẢN PHẨM PHỔ BIẾN</h4>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-12">
				<div class="products-slider4 same-nav owl-carousel owl-theme" data-margin="30" data-dots="false" data-nav="true">
                    @foreach ($product_rating as $item)
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

    <!-- Start Offer Banner Section -->
    <section class="offer-banners">
	<div class="container">
    	<div class="row justify-content-center">
        @foreach($slide as $slide)
        	<div class="col-sm-4 text-center">
            	<a href="#" class="offer-banner same-hover"><img src="{{asset('images')}}/{{$slide->image}}" alt="offer-banner"></a>
            </div>
        @endforeach
        </div>
    </div>
    
</section>
<!-- End Offer Banner  Section -->

<!-- Start Best Saller Section -->
<section class="best-saller">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="title text-center">
                	<h4>Sản Phẩm Giảm Giá</h4>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="products-slider4 same-nav owl-carousel owl-theme" data-margin="30" data-dots="false" data-nav="true">
        @foreach($product as $product)
                	<div class="item">
                    	<div class="saller-box common-cart-box">
                        	<div class="saller-img common-cart-img">
                            	<img src="{{asset('images')}}/{{$product->image}}" alt="Saller-img">
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
                            <div class="saller-info common-cart-info text-center">
                            	<a href="{{Route('singleproduct',['id'=>$item->id])}}" class="cart-name">{{$product->name}}</a>
                                <p class="cart-price"><del>$ {{$product->price}}.00</del>$ {{$product->sale_price}}.00</p>
                            </div>
                        </div>
                    </div>
        @endforeach
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Best Saller Section -->


<!-- Start Subscribe Section -->
<section class="subscribe-section pt_large pb_large">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="title white-title text-center">
                	<h4>THEO DÕI CẬP NHẬT CỦA CHÚNG TÔI!</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-md-10 col-sm-12">
            	<div class="subscribe-inner text-center">
                	<p>Nếu bạn muốn nhận email từ chúng tôi mỗi khi chúng tôi có ưu đãi đặc biệt mới, hãy đăng ký tại đây!</p>
                    <form class="subscribe-form">
                    	<div class="subscribe-input">
                        	<input name="your-email" required="" placeholder="Enter Your Email" type="email">
                        </div>
                        <div class="send-btn">
                        	<button type="submit" class="btn btn-primary">Theo Dõi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Subscribe Section -->

<!-- Start Facility Section-->
<section class="facility-section pb_large pt_large">
	<div class="container">
    	<div class="row">
            <div class="col-md-3 col-6 facility-box box-1">
				<div class="facility-inner">
                    <div class="fb-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="fb-text">
                        <h5>FREE DELIVERY</h5>
                        <span>Worldwide</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 facility-box box-2">
            	<div class="facility-inner">
                    <div class="fb-icon">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <div class="fb-text">
                        <h5>24/ 7 SUPPORT</h5>
                        <span>Customer Support</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 facility-box box-3">
            	<div class="facility-inner">
                    <div class="fb-icon">
                        <i class="fa fa-cc-mastercard"></i>
                    </div>
                    <div class="fb-text">
                        <h5>PAYMENT</h5>
                        <span>Secure System</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 facility-box box-4">
            	<div class="facility-inner">
                    <div class="fb-icon">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="fb-text">
                        <h5>TRUSTED</h5>
                        <span>enuine Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facility Section-->
@endsection