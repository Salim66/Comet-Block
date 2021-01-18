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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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




//Sliders Route
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'slider'], function (){
    Route::get('all', 'SliderController@sliderIndex')->name('slider.add');
    Route::post('store', 'SliderController@sliderStore')->name('slider.store');
    Route::get('slider-show/{id}', 'SliderController@showSlider')->name('slider.show');
    Route::get('slider-inactive/{id}', 'SliderController@inActive')->name('slider.inactive');
    Route::get('slider-active/{id}', 'SliderController@avtive')->name('slider.active');
    Route::delete('slider-delete/{id}', 'SliderController@destroy')->name('slider.destroy');
});
