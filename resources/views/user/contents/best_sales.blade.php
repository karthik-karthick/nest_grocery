<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class="">Daily Best Sells</h3>
            <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @foreach ($products as $product)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                                <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                                <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist'onclick="addwishlist({{ $product->id }});" class='action-btn small hover-up' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='sjavascript:;'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @php
                                            $percents =
                                                (($product->product_price - $product->selling_price) /
                                                    $product->product_price) *
                                                100;
                                            $percent = round($percents);
                                            if ($percent >= 25) {
                                                $label = 'hot';
                                            } elseif ($percent >= 15) {
                                                $label = 'new';
                                            }elseif($percent >= 9){
                                                $label = 'best';
                                            } else {
                                                $label = 'best';
                                            }
                                        @endphp
                                        <span class="{{$label}}">{{ $percent }}% </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->brand->brand_name}}</a>
                                        </div>
                                        <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>&#8377; {{$product->selling_price}} </span>
                                            <span class="old-price">&#8377; {{$product->product_price}}</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up'onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->
                    <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                @foreach ($products as $product)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                                <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                                <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist'onclick="addwishlist({{ $product->id }});" class='action-btn small hover-up' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='sjavascript:;'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @php
                                            $percents =
                                                (($product->product_price - $product->selling_price) /
                                                    $product->product_price) *
                                                100;
                                            $percent = round($percents);
                                            if ($percent >= 25) {
                                                $label = 'hot';
                                            } elseif ($percent >= 15) {
                                                $label = 'new';
                                            }elseif($percent >= 9){
                                                $label = 'best';
                                            } else {
                                                $label = 'best';
                                            }
                                        @endphp
                                        <span class="{{$label}}">{{ $percent }}% </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->brand->brand_name}}</a>
                                        </div>
                                        <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>&#8377; {{$product->selling_price}} </span>
                                            <span class="old-price">&#8377; {{$product->product_price}}</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up'onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                @foreach ($products as $product)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                                <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                                <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist'onclick="addwishlist({{ $product->id }});" class='action-btn small hover-up' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='sjavascript:;'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @php
                                            $percents =
                                                (($product->product_price - $product->selling_price) /
                                                    $product->product_price) *
                                                100;
                                            $percent = round($percents);
                                            if ($percent >= 25) {
                                                $label = 'hot';
                                            } elseif ($percent >= 15) {
                                                $label = 'new';
                                            }elseif($percent >= 9){
                                                $label = 'best';
                                            } else {
                                                $label = 'best';
                                            }
                                        @endphp
                                        <span class="{{$label}}">{{ $percent }}% </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->brand->brand_name}}</a>
                                        </div>
                                        <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>&#8377; {{$product->selling_price}} </span>
                                            <span class="old-price">&#8377; {{$product->product_price}}</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>
<!--End Best Sales-->