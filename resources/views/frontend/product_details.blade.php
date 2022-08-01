@extends('frontend.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('frontend.layouts.category_menu')
            </div>
            <div class="col-sm-9 padding-right">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {!! Session::get('message') !!}
                    </div>
                @endif
                    <div class="product-details"><!--product-details-->

                        <div class="col-sm-5">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="{{url('products/large',$detail_product->image)}}">
                                    <img src="{{url('products/images',$detail_product->image)}}" alt="" id="dynamicImage"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <form action="{{route('addToCart')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                                <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                                <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                                <input type="hidden" name="product_colour" value="{{$detail_product->p_colour}}">
                                <input type="hidden" name="image" value="{{$detail_product->image}}">
                                <input type="hidden" name="stock" value="{{$detail_product->stock}}">
                                <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                                <div class="product-information"><!--/product-information-->
                                    <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                    <h2>{{$detail_product->p_name}}</h2>
                                    <p>Code ID: {{$detail_product->p_code}}</p>
                                    <span>
                                        <select name="size" id="idSize" class="form-control">
                                            <option value="">Select Size</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </span><br>
                                    <span>
                                        <span id="dynamic_price">US ${{$detail_product->price}}</span>
                                        <label>Quantity:</label>
                                        <input type="text" name="quantity" value="{{$detail_product->stock}}" id="inputStock"/>
                                            @if($detail_product->stock>0)
                                                <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                            @endif
                                    </span>
                                    <p><b>Availability:</b>
                                        @if($detail_product->stock>0)
                                            <span id="availableStock">In Stock</span>
                                        @else
                                            <span id="availableStock">Out of Stock</span>
                                        @endif
                                    </p>
                                    <p><b>Condition:</b> New</p>
                                    <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                                </div><!--/product-information-->
                            </form>

                        </div>
                    </div>
            </div>
        </div>

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Product Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab" title="View company Profile">Company Profile</a></li>
                    <li><a href="#reviews" data-toggle="tab" title="Write a review for this product">({{count($customers_reviews)}}) Customer Reviews </a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    <center>{{$detail_product->description}}</center>
                </div>

                <div class="tab-pane fade" id="companyprofile" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product-detail',$detail_product->id)}}" title="View this product"><img src="{{asset('frontEnd/images/home/gallery1.jpg')}}" alt="" /></a>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product-detail',$detail_product->id)}}" title="View this product"><img src="{{asset('frontEnd/images/home/gallery3.jpg')}}" alt="" /></a>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product-detail',$detail_product->id)}}" title="View this product"><img src="{{asset('frontEnd/images/home/gallery2.jpg')}}" alt="" /></a>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product-detail',$detail_product->id)}}" title="View this product"><img src="{{asset('frontEnd/images/home/gallery4.jpg')}}" alt="" /></a>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="reviews" >
                    <div class="col-sm-12">
                        <h2>Customers Reviews and Ratings</h2>
                        @foreach($customers_reviews as $customers_review)
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>{{$customers_review->name}}</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>{{$customers_review->created_at}}</a></li>
                            </ul>
                            <p>{{$customers_review->review}}</p>
                        @endforeach
                        <p><b>Write Your Review</b></p>

                        <form action="{{url('/product-detail',$detail_product->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
										<span>
											<input type="hidden" name="product_id" value="{{$detail_product->id}}"/>
											<input type="text" name="name" placeholder="Your Name"/>
											<input type="email" name="email" placeholder="Email Address"/>
										</span>
                            <textarea name="review" ></textarea>
                            <b>Rating: </b> <img src="{{asset('frontEnd/images/product-details/rating.png')}}" alt="" />
                            <input type="submit" class="btn btn-default pull-right">
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->


        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Related products</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $countChunk=0;?>
                    @foreach($relatedProducts->chunk(3) as $chunk)
                        <?php $countChunk++; ?>
                        <div class="item<?php if($countChunk==1){ echo' active';} ?>">
                            @foreach($chunk as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{url('/product-detail',$item->id)}}"><img src="{{url('/products/images',$item->image)}}" alt="" style="width: 150px;"/></a>
                                                <h2>US ${{$item->price}}</h2>
                                                <p>{{$item->p_name}}</p>
                                                <a href="{{url('/product-detail',$item->id)}}" class="btn btn-default add-to-cart">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->
    </div>
@endsection
