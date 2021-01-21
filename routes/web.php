<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend Routes
Route::get('/', 'App\Http\Controllers\FrontEndController@homePage');
Route::get('/home-classic', 'App\Http\Controllers\FrontEndController@homeClassicPage')->name('home.classic');

//Blog Page Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'blog'], function (){
    Route::get('', 'FrontEndController@blogPage')->name('blog.page');
    Route::get('single/{slug}', 'FrontEndController@blogSinglePage')->name('blog.single.page');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Posts Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'post'], function (){
    //Category Routes
   Route::get('category', 'PostCategoryController@index')->name('category.index');
   Route::post('category/store', 'PostCategoryController@store')->name('category.store');
   Route::get('category/edit/{id}', 'PostCategoryController@edit')->name('category.edit');
   Route::put('category/update', 'PostCategoryController@update')->name('category.update');
   Route::get('category/unpublished/{id}', 'PostCategoryController@unpublished')->name('category.unpublished');
   Route::get('category/published/{id}', 'PostCategoryController@published')->name('category.published');
   Route::delete('category/delete/{id}', 'PostCategoryController@destroy')->name('category.delete');

   //Tags Routes
    Route::get('tags', 'PostTagsController@index')->name('tags.index');
    Route::post('tags/store', 'PostTagsController@store')->name('tags.store');
    Route::get('tags/edit/{id}', 'PostTagsController@edit')->name('tags.edit');
    Route::put('tags/update', 'PostTagsController@update')->name('tags.update');
    Route::get('tags/unpublished/{id}', 'PostTagsController@unpublished')->name('tags.unpublished');
    Route::get('tags/published/{id}', 'PostTagsController@published')->name('tags.published');
    Route::delete('tags/delete/{id}', 'PostTagsController@destroy')->name('tags.destroy');

    //Post Routes
    Route::get('all', 'PostController@index')->name('post.index');
    Route::post('store', 'PostController@store')->name('post.store');
    Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
    Route::patch('update', 'PostController@update')->name('post.update');
    Route::get('unpublished/{id}', 'PostController@unpublished')->name('post.unpublished');
    Route::get('published/{id}', 'PostController@published')->name('post.published');
    Route::delete('delete/{id}', 'PostController@destroy')->name('post.destroy');
});




//Settings Routes
Route::get('settings/logo', 'App\Http\Controllers\SettingsController@logoIndex')->name('logo.index');
Route::put('settings/logo-update', 'App\Http\Controllers\SettingsController@logoUpdate')->name('logo.update');


Route::put('settings/favicon-update', 'App\Http\Controllers\SettingsController@faviconUpdate')->name('favicon.update');


Route::get('settings/social', 'App\Http\Controllers\SettingsController@socialIndex')->name('social.index');
Route::post('settings/logo-update', 'App\Http\Controllers\SettingsController@socialUpdate')->name('social.update');


Route::post('settings/copy-right-update', 'App\Http\Controllers\SettingsController@copyRightUpdate')->name('copy-right.update');


Route::get('settings/clients', 'App\Http\Controllers\SettingsController@clientIndex')->name('clients.index');
Route::put('settings/clients-update', 'App\Http\Controllers\SettingsController@clientsUpdate')->name('clients.update');


//Home Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'home'],  function (){
    Route::get('slider', 'HomePageController@index')->name('slider.index');
    Route::post('slider/update', 'HomePageController@sliderUpdate')->name('slider.update');

    Route::get('Who-We-Are', 'HomePageController@whpWeAreIndex')->name('who.we.are');
    Route::post('Who-We-Are/update', 'HomePageController@whpWeAreUpdate')->name('who.we.are.update');

    Route::get('our-vision', 'HomePageController@ourVisionIndex')->name('our.vision');
    Route::post('our-vision/update', 'HomePageController@ourVisionUpdate')->name('our.vision.update');

    Route::get('testimonials', 'HomePageController@testimonialsIndex')->name('testimonials.index');
    Route::post('testimonials/update', 'HomePageController@testimonialsUpdate')->name('testimonials.update');
});


//Block Sliders Route
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'slider'], function (){
    Route::get('all', 'SliderController@sliderIndex')->name('slider.add');
    Route::post('store', 'SliderController@sliderStore')->name('slider.store');
    Route::get('slider-show/{id}', 'SliderController@showSlider')->name('slider.show');
    Route::get('carousel-slider-show/{id}', 'SliderController@carouselSliderShow')->name('carousel.slider.show');
    Route::get('slider-inactive/{id}', 'SliderController@inActive')->name('slider.inactive');
    Route::get('slider-active/{id}', 'SliderController@avtive')->name('slider.active');
    Route::delete('slider-delete/{id}', 'SliderController@destroy')->name('slider.destroy');
});


//Carousel Sliders Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'carousel/slider'], function (){
    Route::post('store', 'SliderController@carouselSliderStore')->name('carousel.slider.store');
    Route::get('active/{id}', 'SliderController@carouselSliderActive')->name('carousel.slider.active');
    Route::get('inactive/{id}', 'SliderController@carouselSliderInactive')->name('carousel.slider.inactive');
    Route::delete('delete/{id}', 'SliderController@carouselSliderDestroy')->name('carousel.slider.destroy');
});


