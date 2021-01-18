<?php

namespace App\Http\Controllers;

use App\Models\BlockSlider;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Slider Index
     */
    public function index(){
        $slider = BlockSlider::where(['slide_status' => 'Active']) ->get();
        return view('admin.pages.home.slider.index', [
            'slider' => $slider,
        ]);
    }

    /**
     * @param Request $request
     */
    public function sliderUpdate(Request $request){

        $slider_num =  count($request -> subtitle);

        $slider_arr = [];
        for($i=0; $i<$slider_num; $i++){
            $slider = [
                'slider_code' => $request -> slide_code[$i],
                'sub_title' => $request -> subtitle[$i],
                'title' => $request -> title[$i],
                'btn_title_01' => $request -> btntitle_01[$i],
                'btn_link_01' => $request -> btntitle_01[$i],
                'btn_title_02' => $request -> btntitle_02[$i],
                'btn_link_02' => $request -> btnlink_02[$i]
            ];
            array_push($slider_arr, $slider);
        }

        $sliders_arr = [
            'slider_video_url' => $request -> svideo,
            'slider' => $slider_arr
        ];

        $sliders = json_encode($sliders_arr);
        $slider_json = HomePage::find(1);
        $slider_json -> sliders = $sliders;
        $slider_json -> update();
        return redirect() -> route('slider.index') -> with('success', 'Home Page Slider Updated Successful !');
    }

    /**
     * Who we are Index Page
     */
    public function whpWeAreIndex(){
        $home_page_info = HomePage::find(1);
        return view('admin.pages.home.wwe.index', [
            'home_page_info' => $home_page_info
        ]);
    }

    /**
     * Who We Are Update
     */
    public function whpWeAreUpdate(Request $request){
        $wwa_array = [
            'sub_title_one' => $request -> sub_title_one,
            'title_one' => $request -> title_one,
            'description_one' => $request -> description_one,
            'sub_title_two' => $request -> sub_title_two,
            'title_two' => $request -> title_two,
            'branding_title' => $request -> branding_title,
            'branding_description' => $request -> branding_description,
            'interactive_title' => $request -> interactive_title,
            'interactive_description' => $request -> interactive_description,
            'production_title' => $request -> production_title,
            'production_description' => $request -> production_description,
            'editing_title' => $request -> editing_title,
            'editing_description' => $request -> editing_description,
        ];

        $wwa_json = json_encode($wwa_array);
        $home_page = HomePage::find(1);
        $home_page -> wwa = $wwa_json;
        $home_page -> update();
        return redirect() -> route('who.we.are') -> with('success', 'Who We Are Updated Successful !');
    }

    /**
     * Our Vision Index Page
     */
    public function ourVisionIndex(){
        $home_page = HomePage::find(1);
        return view('admin.pages.home.vision.index',[
            'home_page' => $home_page
        ]);
    }

    /**
     * Our Vision Update Page
     */
    public function ourVisionUpdate(Request $request){

        $vision_array = [
          'sub_title_one' => $request -> sub_title_one,
          'title_one' => $request -> title_one,
          'tag_one_title' => $request -> tag_one_title,
          'tag_two_title' => $request -> tag_two_title,
          'tag_three_title' => $request -> tag_three_title,
          'tag_four_title' => $request -> tag_four_title,
          'tag_one_description' => $request -> tag_one_description,
          'tag_two_description' => $request -> tag_two_description,
          'tag_three_description' => $request -> tag_four_description,
          'tag_four_description' => $request -> tag_four_description
        ];

        $vision_json = json_encode($vision_array);
        $home_page = HomePage::find(1);
        $home_page -> vision = $vision_json;
        $home_page -> update();
        return redirect() -> route('our.vision') -> with('success', 'Our Vision Updated Successful !');
    }

    /**
     * Testimonials Index Page
     */
    public function testimonialsIndex(){
        $home_page = HomePage::find(1);
        return view('admin.pages.home.testimonials.index', [
            'home_page' => $home_page
        ]);
    }

    /**
     * Testimonials Update
     */
    public function testimonialsUpdate(Request $request){
        $testimonials_num  = count($request -> description);

        $des_array = [];
        for ($i=0; $i<$testimonials_num; $i++){
            $des = [
              'description' => $request -> description[$i],
              'slide_code' => $request -> slide_code[$i],
              'by' => $request -> by[$i]
            ];
            array_push($des_array, $des);
        }

        $test_array = [
            'title' => $request -> title,
            'descrip' => $des_array
        ];

        $test_json = json_encode($test_array);

        $home_page = HomePage::find(1);
        $home_page -> testimonials = $test_json;
        $home_page -> update();
        return redirect() -> route('testimonials.index') -> with('success', 'Testimonials Updated Successful !');
    }
}
