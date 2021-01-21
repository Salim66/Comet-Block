<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Post::latest() -> get();
        $category_info = PostCategory::all();
        $tags_info = PostTags::all();
        return view('admin.post.index', [
            'all_data' => $all_data,
            'category_info' => $category_info,
            'tags_info' => $tags_info
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
            'content' => 'required',
        ]);

        if($request -> hasFile('featured_image')){
            $image = $request -> file('featured_image');
            $unique_image_name = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/posts/images'), $unique_image_name);
        }

        $post_info = Post::create([
            'title' => $request -> title,
            'slug' => Str::slug($request -> title),
            'user_id' => Auth::user() -> id,
            'featured_image' => $unique_image_name,
            'content' => $request -> content,
        ]);

        $post_info -> categories() -> attach($request -> category);
        $post_info -> tags() -> attach($request -> tag);

        return redirect() -> route('post.index') -> with('success', 'Post Added Successfully ):');
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
        $post_info = Post::find($id);

        //All Category
        $all_category = PostCategory::all();

        //Selected Category
        $selected_category = $post_info -> categories;
        $select_cat = [];
        foreach ($selected_category as $cat){
            array_push($select_cat, $cat -> id);
        }


        $cat_list = '';
        foreach ($all_category as $category){
            if(in_array($category -> id , $select_cat)){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $cat_list .= '<div class="checkbox">
                            <label>
                                <input type="checkbox" '.$checked.' name="category[]" value="'.$category -> id.'"> '. $category -> name .'
                            </label>
                          </div>';
        }

        //All Tags
        $all_tags = PostTags::all();

        //Selected Tags
        $selected_tags = $post_info -> tags;
        $select_tags = [];
        foreach ($selected_tags as $tag){
            array_push($select_tags , $tag -> id);
        }

        $tag_list = '';
        foreach ($all_tags as $tag){
            if (in_array($tag -> id, $select_tags)){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $tag_list .= '<div class="checkbox">
                            <label>
                                <input type="checkbox" '.$checked.' name="tag[]" value="'.$tag -> id.'"> '. $tag -> name .'
                            </label>
                          s</div>';
        }

        return [
            'title' => $post_info -> title,
            'id' => $post_info -> id,
            'image' => $post_info -> featured_image,
            'content' => $post_info -> content,
            'category_list' => $cat_list,
            'tags_list' => $tag_list,
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
        //Find Update Post Info
        $post_info = Post::find($update_id);

        //Find Image
        if($request -> hasFile('featured_image')){
            $image = $request -> file('featured_image');
            $unique_image_file = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/posts/images'), $unique_image_file);
            if (file_exists('media/posts/images/'.$post_info -> featured_image )){
                unlink('media/posts/images/'.$post_info -> featured_image);
            }
        }else{
            $unique_image_file = $post_info -> featured_image;
        }

        $post_info -> title = $request -> title;
        $post_info -> slug = Str::slug($request -> title);
        $post_info -> user_id = Auth::user() -> id;
        $post_info -> featured_image = $unique_image_file;
        $post_info -> content = $request -> content;

        $post_info -> categories() -> detach();
        $post_info -> categories() -> attach($request -> category);

        $post_info -> tags() -> detach();
        $post_info -> tags() -> attach($request -> tag);

        $post_info -> update();

        return redirect() -> route('post.index') -> with('success', 'Post Updated Successfully ):');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_info = Post::find($id);
        $post_info -> delete();
        return redirect() -> route('post.index') -> with('success', 'Post Deleted Successfully ):');
    }

    /**
     * Post Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $post_info = Post::find($id);
        $post_info -> status = "Unpublished";
        $post_info -> update();
        return redirect() -> route('post.index') -> with('success', "Post Unpublished Successfully ):");
    }


    public function published($id){
        $post_info = Post::find($id);
        $post_info -> status = "Published";
        $post_info -> update();
        return  redirect() -> route('post.index') -> with('success', "Post Published Successfully ):");
    }
}
