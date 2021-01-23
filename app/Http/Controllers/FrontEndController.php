<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use App\Models\Sliders;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function homePage(){
        return view('frontend.post.home');
    }

    /**
     * Home Classic Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function homeClassicPage(){
        return view('frontend.post.home-classic');
    }

    /**
     * Blog Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function blogPage(){
        $all_post = Post::latest() -> paginate();
        return view('frontend.post.blog', [
            'all_post' => $all_post
        ]);
    }

    /**
     * Blog Single Page
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function blogSinglePage($slug){
        $single_post = Post::where('slug', $slug) -> first();
        return view('frontend.post.blog-single', [
            'single_post' => $single_post
        ]);
    }

    /**
     * Post Search By Category
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByCategory($slug){
        $category_slug = PostCategory::where('slug', $slug) -> first();
        return view('frontend.post.category-search', [
            'category_slug' => $category_slug
        ]);
    }

    /**
     * Post Search By Tags
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByTags($slug){
        $tags_slug = PostTags::where('slug', $slug) -> first();
        return view('frontend.post.tags-search', [
            'tags_slug' => $tags_slug
        ]);
    }

    /**
     * Post Search By Search Field
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByPost(Request $request){
        $search = $request -> search;
        $post_info = Post::where('title', 'like', '%'.$search.'%') -> orWhere('content', 'like', '%'.$search.'%') -> get();
        return view('frontend.post.search', [
            'post_info' => $post_info
        ]);
    }


    //Product Information

    /**
     * Product Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function productIndexPage(){
        return view('frontend.product.shop');
    }

    public function productSinglePage(){
        return view('frontend.product.single-shop');
    }

}
