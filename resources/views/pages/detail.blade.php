@extends('index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <form method="get" action="{{route('show-product')}}">
                    <h2>Danh Mục Sản Phẩm</h2>
                    @foreach($categories as $category)
                        <input type="radio" id="category" name="category" value="{{$category->id}}">
                        <label for="category">{{$category->cate_name}}</label><br>
                    @endforeach

                    <hr/>

                    <h2>Thương Hiệu Sản Phẩm</h2>

                    @foreach($brands as $brand)
                        <input type="radio" id="brand" name="brand" value="{{$brand->id}}">
                        <label for="brand">{{$brand->brand_name}}</label><br>
                    @endforeach

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
      
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{asset('images/'.$product->image)}}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    
                    <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                            <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                            </div>
                            <div class="item">
                            <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                            </div>
                            <div class="item">
                            <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                            <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                            </div>
                            
                        </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
          
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2>{{$product->name}}</h2>
                    <p>Mã sản phẩm ID: {{$product->id}}</p>
                    <img src="images/product-details/rating.png" alt="" />
                    <form action="{{route('view-cart')}}" method="post">
                        @csrf
                        <span>
                            <span>{{number_format($product->price).'VNĐ'}}</span>
                            <label for="">Số lượng</label>
                                <input name= "qty" type="number" value="1" min="1">
                                <input name= "product_id" type="hidden" value="{{$product->id}}" >
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                            </button>
                        </span>
                    </form>
                    <p><b>Tình trạng :</b> In Stock</p>
                    <p><b>Điều kiện:</b> New</p>
                   
                    <p><b>Thương hiệu: </b>{{$product->brand->brand_name}}</p>
                    <p><b>Danh mục: </b>{{$product->category->cate_name}}</p>
                   
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->
        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#tag" >Chi tiết sản phẩm</a></li>
                    <li ><a href="#reviews">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                   <p>{{$product->content}}</p>
                </div>
                
                <div class="tab-pane fade" id="tag" >
                    <p>{{$product->desc}}</p>
                </div>      
                <div class="tab-pane fade" id="reviews" >
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Write Your Review</b></p>
                        
                        <form action="#">
                            <span>
                                <input type="text" placeholder="Your Name"/>
                                <input type="email" placeholder="Email Address"/>
                            </span>
                            <textarea name="" ></textarea>
                            <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm tương tự </h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">	
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        @foreach ($related_product as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('images/'.$product->image)}}" alt="" />
 
                                                    <h2>{{number_format($product->price).'VNĐ'}}</h2>
                                                    
                                                    <p>{{$product->name}}</p>
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                                                    </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>		
                    </div>	
                </div>
            </div><!--/recommended_items-->
        </div>
</div>
@endsection