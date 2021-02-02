@foreach($product_data as $data)
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
