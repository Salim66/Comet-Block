<?php

namespace App\Http\Controllers;

use App\Models\PostTags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = PostTags::latest() -> get();
        return view('admin.post.tag.index', [
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

        PostTags::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name)
        ]);
        return redirect() -> route('tags.index') -> with('success', 'Tags Added Successful !');
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
        $tags_info = PostTags::find($id);

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
        $tags_id = $request -> id;
        $tags_info = PostTags::find($tags_id);

        $tags_info -> name = $request -> name;
        $tags_info -> slug = Str::slug($request -> name);
        $tags_info -> update();
        return redirect() -> route('tags.index') -> with('success', "Tags Updated Successfully ):");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags_info = PostTags::find($id);
        $tags_info -> delete();
        return redirect() -> route('tags.index') -> with('success', 'Tags Deleted Successfully !');
    }

    /**
     * Tags Unpublished
     * @param $id
     * @return mixed
     */
    public function unpublished($id){
        $tags_info = PostTags::find($id);
        $tags_info -> status = 'Unpublished';
        $tags_info -> update();
        return redirect() -> route('tags.index') -> with('success', 'Tags Unpublished Successfully ):');
    }

    /**
     * Tags Published
     * @param $id
     */
    public function published($id){
        $tags_info = PostTags::find($id);
        $tags_info -> status = 'Published';
        $tags_info -> update();
        return redirect() -> route('tags.index') -> with('success', 'Tags Published Successfully ):');
    }
}
