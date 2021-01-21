<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = PostCategory::latest() -> get();
        return view('admin.post.category.index', [
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

        PostCategory::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
        ]);
        return redirect() -> route('category.index') -> with('success', 'Category Added Successfully !');
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
        $category_info = PostCategory::find($id);

        return [
          'name' => $category_info -> name,
          'id' => $category_info -> id,
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
        $category_id = $request -> id;
        $category_info = PostCategory::find($category_id);
        $category_info -> name = $request -> name;
        $category_info -> slug = Str::slug($request -> name);
        $category_info -> update();
        return redirect() -> route('category.index') -> with('success', 'Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_info = PostCategory::find($id);
        $category_info -> delete();
        return redirect() -> route('category.index') -> with('success', 'Category Deleted Successful !');
    }


    /**
     * Category Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $category_info = PostCategory::find($id);
        $category_info -> status = "Unpublished";
        $category_info -> update();
        return redirect()-> route('category.index')->with('success', 'Category Unpublished Successful !');
    }

    /**
     * Category Published
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function published($id){
        $category_info = PostCategory::find($id);
        $category_info -> status = "Published";
        $category_info -> update();
        return redirect() -> route('category.index')->with('success', 'Category Published Successful !');
    }
}


//Toastr::error('Category Published Successfully :)','Success');
