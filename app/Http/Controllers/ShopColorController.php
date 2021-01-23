<?php

namespace App\Http\Controllers;

use App\Models\ShopColor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = ShopColor::latest() -> get();
        return view('admin.product.colors.index', [
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
            'name' => 'required'
        ]);

        ShopColor::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name)
        ]);

        return redirect() -> route('shop-colors.index') -> with('success', 'Colors Added Successfully ):');
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
        $colors_info = ShopColor::find($id);

        return [
            'name' => $colors_info -> name,
            'id' => $colors_info -> id
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

        $colors_info = ShopColor::find($update_id);
        $colors_info -> name = $request -> name;
        $colors_info -> slug = Str::slug($request -> name);
        $colors_info -> update();
        return redirect() -> route('shop-colors.index') -> with('success', 'Color Updated Successfully ):');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colors_info = ShopColor::find($id);
        $colors_info -> delete();
        return redirect() -> route('shop-colors.index') -> with('success', 'Color Deleted Successfully ):');
    }

    /**
     * Colors Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $colors_info = ShopColor::find($id);
        $colors_info -> status = "Unpublished";
        $colors_info -> update();
        return redirect() -> route('shop-colors.index') -> with('success', 'Color Unpublished Successfully ):');
    }


    public function published($id){
        $colors_info = ShopColor::find($id);
        $colors_info -> status = "Published";
        $colors_info -> update();
        return redirect() -> route('shop-colors.index') -> with('success', 'Color Published Successfully ):');
    }
}
