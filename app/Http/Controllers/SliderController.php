<?php

namespace App\Http\Controllers;

use App\Models\BlockSlider;
use App\Models\CarouselSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Block Slider Index
     */
    public function sliderIndex(){
        $block_slider_info = BlockSlider::latest()->get();
        return view('admin.sliders.index',compact('block_slider_info'));
    }

    /**
     * Block Slider Store
     */
    public function sliderStore(Request $request)
    {
        $this -> validate($request, [
            'slider_video' => 'required',
            'slide_code' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'btntitle_01' => 'required',
            'btnlink_01' => 'required',
            'btntitle_02' => 'required',
            'btnlink_02' => 'required'
        ]);

        $b_slider_num = count($request -> subtitle);

        $b_slides_a = [];
        for($i=0; $i<$b_slider_num; $i++){
            $b_slider = [
              'sub_title' => $request -> subtitle[$i],
              'slide_code' => $request -> slide_code[$i],
              'title' => $request -> title[$i],
              'btn_title_01' => $request -> btntitle_01[$i],
              'btn_link_01' => $request -> btnlink_01[$i],
              'btn_title_02' => $request -> btntitle_02[$i],
              'btn_link_02' => $request -> btnlink_02[$i]
            ];
            array_push($b_slides_a, $b_slider);
        }

        if($request -> hasFile('slider_video')){
            $file = $request -> file('slider_video');
            $video_unique_file = md5(time().rand()) .'.'. $file -> getClientOriginalExtension();
            $file -> move(public_path('media/sliders/video'), $video_unique_file);
        }

        $b_sliders_array = [
          'slider_video_url' => $video_unique_file,
          'slider' => $b_slides_a,
        ];

        $b_slider_json = json_encode($b_sliders_array);

        BlockSlider::create([
            'sliders' => $b_slider_json
        ]);

        return redirect() -> route('slider.add') -> with('success', 'Slider Added Successful !');
    }

    /**
     * All Block Slider
     */
    public function allSlider(){
        $sliders = Sliders::latest() -> get();
        return view('admin.sliders.all-slider.index', compact('sliders'));
    }

    /**
     * Block Slider Unpublished
     */
    public function inActive($id){
        $slider_data = BlockSlider::find($id);
        $slider_data -> slide_status = 'Inactive';
        $slider_data -> update();
        return redirect() -> route('slider.add') -> with('success', 'Slider Inactive Successful !');
    }

    /**
     * Block Slider Published
     */
    public function avtive($id){
        $slider_data = BlockSlider::find($id);
        $slider_data -> slide_status = 'Active';
        $slider_data -> update();
        return redirect() -> route('slider.add') -> with('success', 'Slider Active Successful !');
    }

    /*
     * Single Block Slider Show/Live
     */
    public function showSlider($id){
        $slider_info = BlockSlider::find($id);
        $sliders_data = json_decode($slider_info -> sliders);
        $sub_title = [];
        $title = [];
        $btn_title_01 = [];
        $btn_link_01 = [];
        $btn_title_02 = [];
        $btn_link_02 = [];
        foreach ($sliders_data -> slider as $slider){
            array_push($sub_title, $slider -> sub_title);
            array_push($title, $slider -> title);
            array_push($btn_title_01, $slider -> btn_title_01);
            array_push($btn_link_01, $slider -> btn_link_01);
            array_push($btn_title_02, $slider -> btn_title_02);
            array_push($btn_title_02, $slider -> btn_title_02);
            array_push($btn_link_02, $slider -> btn_link_02);
        }


        return [
          'slider_video_url' => $sliders_data -> slider_video_url,
          'sub_title' => $sub_title,
          'title' => $title,
          'btn_title_01' => $btn_title_01,
          'btn_link_01' => $btn_link_01,
          'btn_title_02' => $btn_title_02,
          'btn_link_02' => $btn_link_02,
        ];

    }

    /**
     * Block Slider Delete/Destroy
     */
    public function destroy($id){
        $slider_info = BlockSlider::find($id);
        $slider_info -> delete();
        return redirect() -> route('slider.add') -> with('success', 'Slider Deleted Successful !');
    }

    /**
     * Carousel Sliders Store
     */
    public function carouselSliderStore(Request $request){

        $slider_num = count($request->sub_title);

        $image_file = $request -> file('image');

        //Image Load
        if($request -> hasFile('image')){
            foreach ($image_file as $img){
                $unique_image_file = md5(time().rand()).'.'. $img -> getClientOriginalExtension();
                $img -> move(public_path('media/sliders/images'), $unique_image_file);
                $u_img_f []= $unique_image_file;
            }
        }

        $slider_array = [];
        for($i=0; $i<$slider_num; $i++){
            $array = [
                'image' => $u_img_f[$i],
                'title' => $request -> title[$i],
                'sub_title' => $request -> sub_title[$i],
                'slide_code' => $request -> slide_code[$i],
                'btn_title_one' => $request -> btn_title_one[$i],
                'btn_link_one' => $request -> btn_link_one[$i],
                'btn_title_two' => $request -> btn_title_two[$i],
                'btn_link_two' => $request -> btn_link_two[$i]
            ];
            array_push($slider_array, $array);
        }

        $slider_json = json_encode($slider_array);


        CarouselSlider::create([
            'sliders' => $slider_json
        ]);

        return redirect() -> route('slider.add') -> with('success', 'Carousel Slider Added Successful !');
    }


    /**
     * Carousel Slider Active
     */
    public function carouselSliderActive($id){
        $carousel_slider = CarouselSlider::find($id);
        $carousel_slider -> slide_status = 'Active';
        $carousel_slider -> update();
        return redirect() -> route('slider.add') -> with('success', 'Carousel Slider Active Successful !');
    }

    /**
     * Carousel Slider Inactive
     */
    public function carouselSliderInactive($id){
        $carousel_slider = CarouselSlider::find($id);
        $carousel_slider -> slide_status = 'Inactive';
        $carousel_slider -> update();
        return redirect() -> route('slider.add') -> with('success', 'Carousel Slider Inactive Successful !');
    }

    /**
     * Carousel Slider Destroy
     */
    public function carouselSliderDestroy($id){
        $carousel_slider = CarouselSlider::find($id);
        $carousel_slider -> delete();
        return redirect() -> route('slider.add') -> with('success', 'Carousel Slider Deleted Successful !');
    }

    /**
     * Single Carousel Slider Show/Live
     */
    public function carouselSliderShow($id){
        $carousel_slider_info = CarouselSlider::find($id);
        $slider_data = json_decode($carousel_slider_info -> sliders);
        $image = [];
        $title = [];
        $sub_title = [];
        $btn_title_one = [];
        $btn_title_two = [];
        $btn_link_one = [];
        $btn_link_two = [];

        foreach ($slider_data as $sliders){
            array_push($image, $sliders -> image);
            array_push($title, $sliders -> title);
            array_push($sub_title, $sliders -> sub_title);
            array_push($btn_title_one, $sliders -> btn_title_one);
            array_push($btn_title_two, $sliders -> btn_title_two);
            array_push($btn_link_one, $sliders -> btn_link_one);
            array_push($btn_link_two, $sliders -> btn_link_two);
        }

        return [
          'image' => $image,
          'title' => $title,
          'sub_title' => $sub_title,
          'btn_title_one' => $btn_title_one,
          'btn_title_two' => $btn_title_two,
          'btn_link_one' => $btn_link_one,
          'btn_link_two' => $btn_link_two,
        ];
    }

}
