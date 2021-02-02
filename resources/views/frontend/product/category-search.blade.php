@extends('frontend.post.layouts.app')


@section('main-content')
    <section class="page-title parallax">
        <div data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/19.jpg')}}" class="parallax-bg"></div>
        <div class="parallax-overlay">
            <div class="centrize">
                <div class="v-center">
                    <div class="container">
                        <div class="title center">
                            <h1 class="upper">Shop</h1>
                            <h4>Free Delivery Worldwide.</h4>
                            <hr>
                        </div>
                    </div>
                    <!-- end of container-->
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">

{{--              Start  Sidebar--}}
                @include('frontend.product.layouts.sidebar')
{{--                End Sidebar--}}

                <div class="col-md-9">

                    <!-- Shop Menu and Search Field -->
                    @include('frontend.product.layouts.shop-menu-search')

                    @php

                        $product_data = App\Models\Shop::latest() -> paginate(6);

                    @endphp

                    <div class="container-fluid">
                        <div class="row">

                        @foreach($category_info -> shops as $data)
                            <div class="col-md-4 col-sm-6">
                                <div class="shop-product">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img style="height: 250px; width: 300px;" src="{{ URL::to('/') }}/media/products/images/{{ $data -> product_image }}" alt="">
                                        </a>
                                        <div class="product-overlay"><a href="{{ route('product.single', $data -> slug) }}" class="btn btn-color-out btn-sm">Add To Cart<i class="ti-bag"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="upper"><a href="{{ route('product.single', $data -> slug) }}">{{ $data -> title }}</a></h4><span>৳ {{ $data -> regular_price }}</span>
                                        <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </div>

                        <ul class="pagination">
                           {{ $product_data -> links() }}
                        </ul>

                        <!-- end of row-->
                        <ul class="pagination">
                            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
                            </li>
                        </ul>
                        <!-- end of pagination-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end of container-->
    </section>
@endsection
