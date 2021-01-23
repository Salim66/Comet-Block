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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
