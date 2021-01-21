<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function homeClassicPage(){
        return view('frontend.post.home-classic');
    }

    public function blogPage(){
        $all_post = Post::latest() -> paginate();
        return view('frontend.post.blog', [
            'all_post' => $all_post
        ]);
    }

    public function blogSinglePage($slug){
        $single_post = Post::where('slug', $slug) -> first();
        return view('frontend.post.blog-single', [
            'single_post' => $single_post
        ]);
    }


}
