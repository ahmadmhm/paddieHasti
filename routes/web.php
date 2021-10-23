<?php

use App\Http\Controllers\Auth\AdminAuthController;
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


Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth'],function(){
    Route::prefix('panel')->group(function(){
        Route::name('panel.')->group(function(){
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
});

Route::any('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();