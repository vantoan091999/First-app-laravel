@extends('index')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <form method="get" action="{{route('show-product')}}" >
                        <h2>Danh Mục Sản Phẩm</h2>
                        @foreach($categories as $category)
                      
                        <input type="radio" onclick="active({{$category->id}})" id="category" name="category" value="{{$category->id}}">
                            <label for="category">{{$category->cate_name}}</label><br>
                        @endforeach

                        <hr/>

                        <h2>Thương Hiệu Sản Phẩm</h2>

                        @foreach($brands as $brand)
                            <input type="radio" onclick="ative({{$brand->id}})" id="brand" name="brand" value="{{$brand->id}}">
                            <label for="brand">{{$brand->brand_name}}</label><br>
                        @endforeach

                        <input type="submit" id="b" class="a" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col-sm-9 padding-right product-change"> 
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm mới </h2>
                    @foreach ($products as $product)
                    <a href="{{route('product-details', ['id' =>$product->id])}}">
                    <div class="col-sm-4 product">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/product1.jpg')}}" alt="" />
                                        <h2>{{number_format($product->price).'VNĐ'}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng </a>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div><!--features_items-->            
            </div>
        </div>
    </div>
</section>

<script>
    function ative(id) {
        console.log(id);
      
    }
    
</script>
@endsection