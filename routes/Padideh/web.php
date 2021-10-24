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
    Route::prefix('panel')->name('panel.')->group(function(){
            Route::get('/dashboard','PanelController@dashboard')->name('dashboard');
            Route::resource('admins','AdminController');
            Route::resource('users','UserController');
            Route::resource('product_categories','ProductCategoryController')->only('index','create','store','destroy');
            Route::resource('products','ProductController');
            Route::resource('pasmands','PasmandController');
            Route::resource('banners','BannerController');
            Route::resource('stories','StoryController');
            Route::resource('article_categories','ArticleCategoryController')->only('index','create','store','destroy');
            Route::resource('articles','ArticleController');
    });
});

Route::any('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

