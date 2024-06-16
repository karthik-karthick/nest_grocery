<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Popular Products</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Milks & Dairies</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Coffes & Teas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-four" type="button" role="tab" aria-controls="tab-four" aria-selected="false">Pet Foods</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-five" data-bs-toggle="tab" data-bs-target="#tab-five" type="button" role="tab" aria-controls="tab-five" aria-selected="false">Meats</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-six" data-bs-toggle="tab" data-bs-target="#tab-six" type="button" role="tab" aria-controls="tab-six" aria-selected="false">Vegetables</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-seven" data-bs-toggle="tab" data-bs-target="#tab-seven" type="button" role="tab" aria-controls="tab-seven" aria-selected="false">Fruits</button>
                </li>
            </ul>
        </div>

        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                  
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->

            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                    
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab two-->

            <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                    
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab three-->

            <div class="tab-pane fade" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                   
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab four-->

            <div class="tab-pane fade" id="tab-five" role="tabpanel" aria-labelledby="tab-five">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                   
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab five-->

            <div class="tab-pane fade" id="tab-six" role="tabpanel" aria-labelledby="tab-six">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                   
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab six-->

            <div class="tab-pane fade" id="tab-seven" role="tabpanel" aria-labelledby="tab-seven">
                <div class="row product-grid-4">
                    @foreach ($products as $product)                    
                    
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='{{route('prod.detail',['id'=>$product->id])}}'>
                                        <img class="default-img" src="{{ asset($product->product_image)}}" alt="" />
                                        <img class="hover-img" src="{{ asset($product->product_image)}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label='Add To Wishlist' onclick="addwishlist({{ $product->id }});" class='action-btn' href='javascript:;'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn' href='javascript:;'><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                                    <a href='shop-grid-right.html'>{{$product->category->category_name}}</a>
                                </div>
                                <h2><a href='{{route('prod.detail',['id'=>$product->id])}}'>{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{$product->brand->brand_name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>&#8377; {{$product->selling_price}}</span>
                                        <span class="old-price">&#8377; {{$product->product_price}}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class='add' onclick="addtocart({{ $product->id }})" href='javascript:;'><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->         
                    @endforeach                   
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab seven-->

        </div>
        <!--End tab-content-->
    </div>
</section>
<!--Products Tabs-->




