<?php

namespace App\Http\Controllers;

use App\Models\ShopTags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = ShopTags::latest() -> get();
        return view('admin.product.tag.index', [
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

        ShopTags::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name)
        ]);

        return redirect() -> route('shop-tags.index') -> with('success', 'Tags Added Successfully ):');
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
        $tags_info = ShopTags::find($id);

        return [
            'name' => $tags_info -> name,
            'id' => $tags_info -> id
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

        $tags_info = ShopTags::find($update_id);
        $tags_info -> name = $request -> name;
        $tags_info -> slug = Str::slug($request -> name);
        $tags_info -> update();
        return redirect() -> route('shop-tags.index') -> with('success', 'Tags Updated Successfully ):');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags_info = ShopTags::find($id);
        $tags_info -> delete();
        return redirect() -> route('shop-tags.index') -> with('success', 'Tags Deleted Successfully !');
    }


    /**
     * Tags Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $tags_info = ShopTags::find($id);
        $tags_info -> status = "Unpublished";
        $tags_info -> update();
        return redirect() -> route('shop-tags.index') -> with('success', 'Tags Unpublished Successfully ):');
    }

    public function published($id){
        $tags_info = ShopTags::find($id);
        $tags_info -> status = "Published";
        $tags_info -> update();
        return redirect() -> route('shop-tags.index') -> with('success', 'Tags Published Successfully ):');
    }
}
