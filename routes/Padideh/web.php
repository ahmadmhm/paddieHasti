<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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

Route::get('admin/login','Padideh\Admin\AdminAuthController@login')->name('login');
Route::post('admin/login','Padideh\Admin\AdminAuthController@postLogin')->name('login.post');
Route::group(['namespace'=>'Padideh\Admin','middleware'=>'auth:admin'],function(){
    Route::get('imagecache', function () {
       return 'ok';
    })->name('imagecache');
    Route::prefix('panel')->name('panel.')->group(function(){
            Route::get('/dashboard','PanelController@dashboard')->name('dashboard');
            Route::resource('admins','AdminController');
            Route::resource('users','UserController');
            Route::get('address/{user}','AddressController@show')->name('address.show');
            Route::resource('product_categories','ProductCategoryController')->only('index','create','store','destroy');
            Route::resource('products','ProductController');
            Route::resource('pasmands','PasmandController');
            Route::resource('banners','BannerController');
            Route::resource('stories','StoryController');
            Route::resource('article_categories','ArticleCategoryController')->only('index','create','store','destroy');
            Route::resource('articles','ArticleController');

            Route::resource('orders','OrderController');

            Route::get('orders/watting_confirm','OrderController@watting_confirm')->name('orders.watting_confirm');
            Route::get('orders/order_process','OrderController@process')->name('orders.order_process');
            Route::get('orders/watting_driver','OrderController@watting_driver')->name('orders.watting_driver');
            Route::get('orders/cancel/{waste_order}','OrderController@cancel')->name('orders.cancel');
            Route::get('orders/change_status/{waste_order}','OrderController@cancel')->name('orders.change_status');
            Route::put('orders/change_status/{waste_order}','OrderController@cancelStatus')->name('orders.cancel_status');

            Route::resource('order_status','OrderStatusController')->only('index','store','destroy','create');
            Route::resource('drivers','DriverController');
            Route::resource('driver_status','DriverStatusController')->only('index','store','destroy');
    });
});

Route::any('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

