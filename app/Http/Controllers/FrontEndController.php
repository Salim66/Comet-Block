<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\ShopTags;
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


    public function singlePortfolioPage($slug){
        $portfolio_single = Portfolio::where('slug', $slug) -> first();
        return view('frontend.post.portfolio-single', [
            'portfolio_single' => $portfolio_single
        ]);
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
    public function productIndexPage(Request $request){
        if($request -> ajax()){
            $min_price =  $request -> start;
            $max_price =  $request -> end;
//            $product_data = Shop::where('regular_price', '>=', $min_price) -> where('regular_price', '<=', $max_price) -> orderby('regular_price','DESC') -> get();
            $product_data = Shop::whereBetween('regular_price', [$min_price, $max_price]) -> orderby('regular_price', 'DESC') -> get();

            response() -> json($product_data);
            return view('frontend.product.product-range', compact('product_data'));
        }else {
            return view('frontend.product.shop');
        }
    }

    /**
     * Single Product Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function productSinglePage($slug){
        $single_product = Shop::where('slug', $slug) -> first();
        return view('frontend.product.single-shop', [
            'single_product' => $single_product
        ]);
    }

    /**
     * Product Search By Category
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByProductCategory($slug){
        $category_info = ShopCategory::where('slug', $slug) -> first();
        return view('frontend.product.category-search', [
            'category_info' => $category_info
        ]);
    }

    /**
     * Product Search By Tags
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByProductTags($slug){
        $tags_info = ShopTags::where('slug', $slug) -> first();
        return view('frontend.product.tags-search', [
            'tags_info' => $tags_info
        ]);
    }

    /**
     * Product Search By Search Field
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByProduct(Request $request){
        $search = $request -> search;
        $shop_info = Shop::where('title', 'like', '%'.$search.'%') -> get();
        return view('frontend.product.search', [
            'shop_info' => $shop_info
        ]);
    }

    /**
     * Product Search By Price Range
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchByProductPrice(Request $request){
        list($min_price, $max_price) = explode(':', $request->price);
        $shop_info = Shop::whereBetween('regular_price', [$min_price, $max_price]) -> get();
//        $shop_info = Shop::where('regular_price', '>=', $min_price) -> orWhere('regular_price', '<=', $max_price) -> get();
        return view('frontend.product.price-range-search', [
            'shop_info' => $shop_info
        ]);
    }



}
