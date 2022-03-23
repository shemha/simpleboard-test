<?php

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

Route::get('/', function () {
    return view('welcome');
});

// パスの先頭に'posts'を指定して、CRUDルーティングを使用するため'PostController'を利用できるようにする
Route::resource('posts', 'PostController');

/**
 * それぞれのルーティングを設定する場合
 * Route::get('/posts', 'PostController@index');
 * Route::get('/posts', 'PostController@store');
 * Route::get('/posts', 'PostController@create');
 * Route::get('/posts', 'PostController@show');
 * Route::get('/posts', 'PostController@edit');
 * Route::get('/posts', 'PostController@update');
 * Route::get('/posts', 'PostController@destroy');
 */

// HTTPS接続でアセット(CSSや画像など)を読み込むための処理
// APP_ENVの値が指定のものなら、HTTPS接続でアセットを読み込むことができるようにする
if (env('APP_ENV') === 'local') {
    // SSL通信するよう指定
    URL::forceScheme('https');
}