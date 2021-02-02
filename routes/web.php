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
Route::get('/single-portfolio/{slug}', 'App\Http\Controllers\FrontEndController@singlePortfolioPage')->name('single.portfolio');

//Product Page Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'product'], function (){
    Route::get('', 'FrontEndController@productIndexPage')->name('product.page');
    Route::get('single/{slug}', 'FrontEndController@productSinglePage')->name('product.single');
});

//Blog Page Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'blog'], function (){
    Route::get('', 'FrontEndController@blogPage')->name('blog.page');
    Route::get('single/{slug}', 'FrontEndController@blogSinglePage')->name('blog.single.page');
});

//Blog Post Search By Category
Route::get('category/{slug}', 'App\Http\Controllers\FrontEndController@searchByCategory')->name('search.category');

//Blog Post Search By Tags
Route::get('tags/{slug}', 'App\Http\Controllers\FrontEndController@searchByTags')->name('search.tags');

//Blog Post Search By Search Field
Route::post('search', 'App\Http\Controllers\FrontEndController@searchByPost')->name('search.post');


//Product Search By Category
Route::get('product-category/{slug}', 'App\Http\Controllers\FrontEndController@searchByProductCategory')->name('product.search.category');

//Product Search By Tags
Route::get('product-tags/{slug}', 'App\Http\Controllers\FrontEndController@searchByProductTags')->name('product.search.tags');

//Product Search By Search Field
Route::post('product-search', 'App\Http\Controllers\FrontEndController@searchByProduct')->name('search.product');

//Product search By Price Range
Route::post('price-range', 'App\Http\Controllers\FrontEndController@searchByProductPrice')->name('search.product.price');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Authenticate Middleware
Route::group(['middleware' => 'auth'], function (){
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




//Products Routes
    Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'product'], function (){
        //Category Routes
        Route::get('category', 'ShopCategoryController@index')->name('shop-category.index');
        Route::post('category/store', 'ShopCategoryController@store')->name('shop-category.store');
        Route::get('category/edit/{id}', 'ShopCategoryController@edit')->name('shop-category.edit');
        Route::put('category/update', 'ShopCategoryController@update')->name('shop-category.update');
        Route::get('category/unpublished/{id}', 'ShopCategoryController@unpublished')->name('shop-category.unpublished');
        Route::get('category/published/{id}', 'ShopCategoryController@published')->name('shop-category.published');
        Route::delete('category/delete/{id}', 'ShopCategoryController@destroy')->name('shop-category.delete');

        //Tags Routes
        Route::get('tags', 'ShopTagsController@index')->name('shop-tags.index');
        Route::post('tags/store', 'ShopTagsController@store')->name('shop-tags.store');
        Route::get('tags/edit/{id}', 'ShopTagsController@edit')->name('shop-tags.edit');
        Route::put('tags/update', 'ShopTagsController@update')->name('shop-tags.update');
        Route::get('tags/unpublished/{id}', 'ShopTagsController@unpublished')->name('shop-tags.unpublished');
        Route::get('tags/published/{id}', 'ShopTagsController@published')->name('shop-tags.published');
        Route::delete('tags/delete/{id}', 'ShopTagsController@destroy')->name('shop-tags.destroy');

        //Colors Routes
        Route::get('colors', 'ShopColorController@index')->name('shop-colors.index');
        Route::post('colors/store', 'ShopColorController@store')->name('shop-colors.store');
        Route::get('colors/edit/{id}', 'ShopColorController@edit')->name('shop-colors.edit');
        Route::put('colors/update', 'ShopColorController@update')->name('shop-colors.update');
        Route::get('colors/unpublished/{id}', 'ShopColorController@unpublished')->name('shop-colors.unpublished');
        Route::get('colors/published/{id}', 'ShopColorController@published')->name('shop-colors.published');
        Route::delete('colors/delete/{id}', 'ShopColorController@destroy')->name('shop-colors.destroy');

        //Sizes Routes
        Route::get('sizes', 'ShopSizeController@index')->name('shop-sizes.index');
        Route::post('sizes/store', 'ShopSizeController@store')->name('shop-sizes.store');
        Route::get('sizes/edit/{id}', 'ShopSizeController@edit')->name('shop-sizes.edit');
        Route::put('sizes/update', 'ShopSizeController@update')->name('shop-sizes.update');
        Route::get('sizes/unpublished/{id}', 'ShopSizeController@unpublished')->name('shop-sizes.unpublished');
        Route::get('sizes/published/{id}', 'ShopSizeController@published')->name('shop-sizes.published');
        Route::delete('sizes/delete/{id}', 'ShopSizeController@destroy')->name('shop-sizes.destroy');

        //Product Routes
        Route::get('all', 'ShopController@index')->name('product.index');
        Route::post('store', 'ShopController@store')->name('product.store');
        Route::get('edit/{id}', 'ShopController@edit')->name('product.edit');
        Route::patch('update', 'ShopController@update')->name('product.update');
        Route::get('unpublished/{id}', 'ShopController@unpublished')->name('product.unpublished');
        Route::get('published/{id}', 'ShopController@published')->name('product.published');
        Route::get('published/{id}', 'ShopController@published')->name('product.published');
        Route::delete('delete/{id}', 'ShopController@destroy')->name('product.destroy');
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


//Portfolio Routes
    Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'portfolio'], function(){
        //Category Routes
        Route::get('category', 'PortfolioCategoryController@index')->name('portfolio.category.index');
        Route::post('category/store', 'PortfolioCategoryController@store')->name('portfolio.category.store');
        Route::get('category/edit/{id}', 'PortfolioCategoryController@edit')->name('portfolio.category.edit');
        Route::put('category/update', 'PortfolioCategoryController@update')->name('portfolio.category.update');
        Route::get('category/unpublished/{id}', 'PortfolioCategoryController@unpublished')->name('portfolio.category.unpublished');
        Route::get('category/published/{id}', 'PortfolioCategoryController@published')->name('portfolio.category.published');
        Route::delete('category/delete/{id}', 'PortfolioCategoryController@destroy')->name('portfolio.category.delete');

        //Tags Routes
        Route::get('tags', 'PortfolioTagsController@index')->name('portfolio.tags.index');
        Route::post('tags/store', 'PortfolioTagsController@store')->name('portfolio.tags.store');
        Route::get('tags/edit/{id}', 'PortfolioTagsController@edit')->name('portfolio.tags.edit');
        Route::put('tags/update', 'PortfolioTagsController@update')->name('portfolio.tags.update');
        Route::get('tags/unpublished/{id}', 'PortfolioTagsController@unpublished')->name('portfolio.tags.unpublished');
        Route::get('tags/published/{id}', 'PortfolioTagsController@published')->name('portfolio.tags.published');
        Route::delete('tags/delete/{id}', 'PortfolioTagsController@destroy')->name('portfolio.tags.destroy');

        //Portfolio Routes
        Route::get('all', 'PortfolioController@index')->name('portfolio.index');
        Route::post('store', 'PortfolioController@store')->name('portfolio.store');
        Route::get('edit/{id}', 'PortfolioController@edit')->name('portfolio.edit');
        Route::patch('update', 'PortfolioController@update')->name('portfolio.update');
        Route::get('unpublished/{id}', 'PortfolioController@unpublished')->name('portfolio.unpublished');
        Route::get('published/{id}', 'PortfolioController@published')->name('portfolio.published');
        Route::delete('delete/{id}', 'PortfolioController@destroy')->name('portfolio.destroy');
    });

});




