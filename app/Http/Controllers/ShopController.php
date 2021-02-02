<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\ShopColor;
use App\Models\ShopSize;
use App\Models\ShopTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Shop::latest() -> get();
        $category_info = ShopCategory::all();
        $tags_info = ShopTags::all();
        $color_info = ShopColor::all();
        $size_info =ShopSize::all();
        return view('admin.product.index', [
            'all_data' => $all_data,
            'category_info' => $category_info,
            'tags_info' => $tags_info,
            'color_info' => $color_info,
            'size_info' => $size_info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'regular_price' => 'required',
            'description' => 'required'
        ]);

        //Image Find and Load
        if($request -> hasFile('product_image')){
            $image = $request -> file('product_image');
            $image_unique_file = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/products/images'), $image_unique_file);
        }

        $shop = Shop::create([
            'title' => $request -> title,
            'slug' => Str::slug($request -> title),
            'user_id' => Auth::user() -> id,
            'regular_price' => $request -> regular_price,
            'sell_price' => $request -> sell_price,
            'product_image' => $image_unique_file,
            'description' => $request -> description
        ]);

        $shop -> categories() -> attach($request -> category);
        $shop -> tags() -> attach($request -> tag);
        $shop -> colors() -> attach($request -> color);
        $shop -> sizes() -> attach($request -> size);

        return redirect() -> route('product.index') -> with('success', 'Product Added Successfully ):');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop_info = Shop::find($id);

        //Category Checkbox info
        $all_category = ShopCategory::all();

        //Checked Category By Product
        $checked_category = $shop_info -> categories;
        $check_cat = [];
        foreach ($checked_category as $category){
            array_push($check_cat, $category -> id);
        }

        $category_list = '';
        foreach ($all_category as $category){
            if(in_array($category -> id, $check_cat)){
                $checked = 'checked';
            }else {
                $checked = '';
            }
            $category_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="category[]" value="'.$category -> id.'"> '.$category -> name.'
                                    </label>
                                </div>';
        }

        //Tags Checkbox Info
        $all_tags = ShopTags::all();

        //Checked Tags By Product
        $checked_tags = $shop_info -> tags;
        $check_tag = [];
        foreach ($checked_tags as $tag){
            array_push($check_tag, $tag -> id);
        }

        $tags_list = '';
        foreach ($all_tags as $tag){
            if(in_array($tag -> id, $check_tag)){
                $checked = 'checked';
            }else {
                $checked = '';
            }
            $tags_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="tag[]" value="'.$tag -> id.'"> '.$tag -> name.'
                                    </label>
                                </div>';
        }

        //Colors Checkbox Info
        $all_colors = ShopColor::all();

        //Checked Color By Product
        $checked_color = $shop_info -> colors;
        $check_color = [];
        foreach ($checked_color as $color){
            array_push($check_color, $color -> id);
        }

        $colors_list = '';
        foreach ($all_colors as $color){
            if(in_array($color -> id, $check_color)){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $colors_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="color[]" value="'.$color -> id.'"> '.$color -> name.'
                                    </label>
                                </div>';
        }

        //Sizes Checkbox Info
        $all_sizes = ShopSize::all();

        //Checked Size By Product
        $checked_size = $shop_info -> sizes;
        $check_size = [];
        foreach ($checked_size as $size){
            array_push($check_size, $size -> id);
        }

        $sizes_list = '';
        foreach ($all_sizes as $size){
            if(in_array($size -> id, $check_size)){
                $checked = 'checked';
            }else {
                $checked = '';
            }
            $sizes_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="size[]" value="'.$size -> id.'"> '.$size -> size.'
                                    </label>
                                </div>';
        }



        return [
            'title' => $shop_info -> title,
            'id' => $shop_info -> id,
            'regular_price' => $shop_info -> regular_price,
            'sell_price' => $shop_info -> sell_price,
            'image' => $shop_info -> product_image,
            'discription' => $shop_info -> description,
            'category_list' => $category_list,
            'tags_list' => $tags_list,
            'colors_list' => $colors_list,
            'sizes_list' => $sizes_list
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_id = $request -> id;
        $shop_info = Shop::find($update_id);

        //Image Check And Load
        if($request -> hasFile('product_image')){
            $image = $request -> file('product_image');
            $image_unique_file = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/products/images'), $image_unique_file);
            if (file_exists('media/products/images/'.$shop_info -> product_image)){
                unlink('media/products/images/'.$shop_info -> product_image);
            }
        }else{
            $image_unique_file = $shop_info -> product_image;
        }


        $shop_info -> title = $request -> title;
        $shop_info -> slug = Str::slug($request -> title);
        $shop_info -> user_id = Auth::user() -> id;
        $shop_info -> regular_price = $request -> regular_price;
        $shop_info -> sell_price = $request -> sell_price;
        $shop_info -> product_image = $image_unique_file;
        $shop_info -> description = $request -> discription;

        $shop_info -> categories() -> detach();
        $shop_info -> categories() -> attach($request -> category);

        $shop_info -> tags() -> detach();
        $shop_info -> tags() -> attach($request -> tag);

        $shop_info -> colors() -> detach();
        $shop_info -> colors() -> attach($request -> color);

        $shop_info -> sizes() -> detach();
        $shop_info -> sizes() -> attach($request -> size);

        $shop_info -> update();

        return redirect() -> route('product.index') -> with('success', 'Product Updated Successfully ):');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop_info = Shop::find($id);
        $shop_info -> delete();
        return redirect() -> route('product.index') -> with('success', 'Product Deleted Successfully ):');
    }

    /**
     * Product Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $shop_info = Shop::find($id);
        $shop_info -> status = "Unpublished";
        $shop_info -> update();
        return redirect() -> route('product.index') -> with('success', 'Product Unpublished Successfully ):');
    }

    /**
     * Product Published
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function published($id){
        $shop_info = Shop::find($id);
        $shop_info -> status = "Published";
        $shop_info -> update();
        return redirect() -> route('product.index') -> with('success', 'Product Published Successfully ):');
    }
}
