<div class="col-md-3 hidden-sm hidden-xs">
    <div class="sidebar">
        <div class="widget">
            <h6 class="upper">Categories</h6>
            <ul class="nav">
                @php
                    $category_info = App\Models\ShopCategory::take(5) -> get();
                @endphp

                @foreach($category_info as $category)
                    <li><a href="{{ route('product.search.category', $category -> slug) }}">{{ $category -> name }}</a></li>
                @endforeach

            </ul>
        </div>
        <!--Start Price Range -->
        <div class="widget ml-0" >
            <div style="width: 270px;" id="slider-range"></div>

            <div>
                <b class="pull-left"><span>৳ </span><input size="2" type="text" id="amount_start" name="start_price" value="200" style="border: none; color: red;" readonly></b>
                <b class="pull-right"><span>৳ </span><input size="2" type="text" id="amount_end" name="end_price" value="700" style="border: none; color: red;" readonly></b>
            </div>
            <br><br>
        </div>
        <!--End Price Range -->
        <!-- end of widget        -->
        <div class="widget">
            <h6 class="upper">Trending Products</h6>
            <ul class="nav product-list">
                @php
                    $shop_info = App\Models\Shop::take(2) -> get();
                @endphp

                @foreach($shop_info as $shop)
                <li>
                    <div class="product-thumbnail">
                        <img src="{{ URL::to('/') }}/media/products/images/{{ $shop -> product_image }}" alt="">
                    </div>
                    <div class="product-summary"><a href="{{ route('product.single', $shop -> slug) }}">{{ $shop -> title }}</a><span>৳ {{ $shop -> regular_price }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- end of widget          -->

        <!-- end of widget        -->
        <div class="widget">
            <h6 class="upper">Popular Tags</h6>
            <div class="tags clearfix">
            @php
                $tags_info = App\Models\ShopTags::take(5) -> get();
            @endphp

            @foreach($tags_info as $tag)
                <a href="{{ route('product.search.tags', $tag -> slug) }}">{{ $tag -> name }}</a>
            @endforeach
            </div>
        </div>
        <!-- end of widget      -->
    </div>
    <!-- end of sidebar-->
</div>


{{--<script>--}}
{{--    function send(){--}}
{{--        var start = $('#amount_start').val();--}}
{{--        var end = $('#amount_end').val();--}}


{{--        $.ajax({--}}
{{--            type : 'get',--}}
{{--            dataType : 'html',--}}
{{--            url : '/product',--}}
{{--            data : { start: start, end: end },   //'start=' +start+ '& end=' +end,--}}
{{--            success: function(data){--}}
{{--                console.log(data);--}}
{{--                $('#divTodo').html(data);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
