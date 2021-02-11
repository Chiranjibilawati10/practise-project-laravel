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
Auth::routes();


Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/', 'PagesController@getIndex');
    Route::get('contact','PagesController@getContact');
    Route::post('contact','PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('blog', ['uses'=> 'BlogController@getIndex',['as' => 'blog.index']]);
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
    Route::resource('comments', 'CommentController');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    
});

Route::get('/home', 'HomeController@index')->name('home');
