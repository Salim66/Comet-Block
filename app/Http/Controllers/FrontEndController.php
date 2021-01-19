<?php

namespace App\Http\Controllers;

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

    public function homeClassicPage(){
        return view('frontend.post.home-classic');
    }
}
