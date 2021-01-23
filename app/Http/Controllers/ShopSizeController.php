<?php

namespace App\Http\Controllers;

use App\Models\ShopSize;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = ShopSize::latest() -> get();
        return view('admin.product.sizes.index', [
            'all_data' => $all_data
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
            'size' => 'required'
        ]);

        ShopSize::create([
            'size' => $request -> size,
            'slug' => Str::slug($request -> size)
        ]);

        return redirect() -> route('shop-sizes.index') -> with('success', 'Size Added Successfully ):');
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
        $size_info = ShopSize::find($id);

        return [
            'size' => $size_info -> size,
            'id' => $size_info -> id
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

        $size_info = ShopSize::find($update_id);
        $size_info -> size = $request -> size;
        $size_info -> slug = Str::slug($request -> size);
        $size_info -> update();
        return redirect() -> route('shop-sizes.index') -> with('success', 'Size Updated Successfully ):');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size_info = ShopSize::find($id);
        $size_info -> delete();
        return redirect() -> route('shop-sizes.index') -> with('success', 'Size Deleted Successfully ):');
    }


    /**
     * Size Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $size_info = ShopSize::find($id);
        $size_info -> status = "Unpublished";
        $size_info -> update();
        return redirect() -> route('shop-sizes.index') -> with('success', 'Size Unpublished Successfully ):');
    }

    /**
     * Size Published
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function published($id){
        $size_info = ShopSize::find($id);
        $size_info -> status = "Published";
        $size_info -> update();
        return redirect() -> route('shop-sizes.index') -> with('success', 'Size Published Successfully ):');
    }
}
