<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_data = Portfolio::latest() -> get();
        $category_info = PortfolioCategory::all();
        $tags_info = PortfolioTags::all();
        return view('admin.portfolio.index', [
            'all_data' => $all_data,
            'category_info' => $category_info,
            'tags_info' => $tags_info,
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
            'sub_title' => 'required',
            'description' => 'required',
        ]);

        if($request -> hasFile('featured_image')){
            $image = $request -> file('featured_image');
            $unique_image_file = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/portfolio/images'), $unique_image_file);
        }

        $portfolio = Portfolio::create([
            'title' => $request -> title,
            'slug' => Str::slug($request -> title),
            'sub_title' => $request -> sub_title,
            'user_id' => Auth::user() -> id,
            'featured_image' => $unique_image_file,
            'discription' => $request -> description,
        ]);

        $portfolio -> categories() -> attach($request -> category);
        $portfolio -> tags() -> attach($request -> tag);


        return redirect() -> route('portfolio.index') -> with('success', 'Portfolio Added Successfully ):');
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
        $portfolio_info = Portfolio::find($id);

        //Category All
        $all_Category = PortfolioCategory::all();

        //Checked Category By Portfolio
        $checked_category = $portfolio_info -> categories;
        $check_cat = [];
        foreach ($checked_category as $categories){
            array_push($check_cat, $categories -> id);
        }

        $category_list = '';
        foreach ($all_Category as $category){
            if (in_array($category -> id, $check_cat)){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $category_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="category[]" value="'. $category -> id .'"> '.$category -> name.'
                                    </label>
                                </div>';
        }

        //Tags All
        $all_tags = PortfolioTags::all();

        //Checked Tags
        $checked_tags = $portfolio_info -> tags;
        $check_tag = [];
        foreach ($checked_tags as $tags){
            array_push($check_tag, $tags -> id);
        }

        $tags_list = '';
        foreach ($all_tags as $tags){
            if(in_array($tags -> id, $check_tag)){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $tags_list .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" '.$checked.' name="tag[]" value="'. $tags -> id .'"> '.$tags -> name.'
                                    </label>
                                </div>';
        }


        return [
            'title' => $portfolio_info -> title,
            'id' => $portfolio_info -> id,
            'sub_title' => $portfolio_info -> sub_title,
            'featured_image' => $portfolio_info -> featured_image,
            'discription' => $portfolio_info -> discription,
            'category_list' => $category_list,
            'tags_list' => $tags_list,
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

        $portfolio_info = Portfolio::find($update_id);

        //Image Check
        if($request -> hasFile('featured_image')){
            $image = $request -> file('featured_image');
            $image_unique_file = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/portfolio/images/'), $image_unique_file);
            if(file_exists('media/portfolio/images/'.$portfolio_info -> featured_image)){
                unlink('media/portfolio/images/'.$portfolio_info -> featured_image);
            }
        }else{
            $image_unique_file = $portfolio_info -> featured_image;
        }

        $portfolio_info -> title = $request -> title;
        $portfolio_info -> slug = Str::slug($request -> title);
        $portfolio_info -> sub_title = $request -> sub_title;
        $portfolio_info -> user_id = Auth::user() -> id;
        $portfolio_info -> featured_image = $image_unique_file;
        $portfolio_info -> discription = $request -> description;
        $portfolio_info -> update();

        $portfolio_info -> categories() -> detach();
        $portfolio_info -> categories() -> attach($request -> category);

        $portfolio_info -> tags() -> detach();
        $portfolio_info -> tags() -> attach($request -> tag);

        return redirect() -> route('portfolio.index') -> with('success', 'Portfolio Updated Successfully ):');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio_info = Portfolio::find($id);
        $portfolio_info -> delete();
        return redirect() -> route('portfolio.index') -> with('success', 'Portfolio Deleted Successfully ):');
    }

    /**
     * Portfolio Unpublished
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublished($id){
        $portfolio_info = Portfolio::find($id);
        $portfolio_info -> status = 'Unpublished';
        $portfolio_info -> update();
        return redirect() -> route('portfolio.index') -> with('success', 'Portfolio Unpublished Successfully ):');
    }

    public function published($id){
        $portfolio_info = Portfolio::find($id);
        $portfolio_info -> status = "Published";
        $portfolio_info -> update();
        return redirect() -> route('portfolio.index') -> with('success', 'Portfolio Published Successfully ):');
    }
}
