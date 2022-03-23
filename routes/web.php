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

/**
 * // デフォルトではviewsディレクトリにある'welcome'bladeファイルを読み込むようになっている
 * Route::get('/', function () {
 *     return view('welcome');
 * });
 */
Route::get('/', 'PostController@index');

// パスの先頭に'posts'を指定して、CRUDルーティングを使用するため'PostController'を利用できるようにする
Route::resource('posts', 'PostController');

/**
 * それぞれのルーティングを設定する場合
 * Route::get('posts', 'PostController@index'); // 一覧画面
 * Route::get('posts/create', 'PostController@create'); // 更新画面
 * Route::post('posts', 'PostController@store'); // 更新処理
 * Route::get('posts/{id}', 'PostController@show'); // 詳細画面
 * Route::get('posts/{id}/edit', 'PostController@edit'); // 詳細編集画面
 * Route::put('posts/{id}', 'PostController@update'); // 詳細編集処理
 * Route::delete('posts/{id}', 'PostController@destory'); // 詳細編集処理
 */

/** 
 * // Cloud9の時は必要
 * // HTTPS接続でアセット(CSSや画像など)を読み込むための処理
 * // APP_ENVの値が指定のものなら、HTTPS接続でアセットを読み込むことができるようにする
 * if (env('APP_ENV') === 'local') {
 *     // SSL通信するよう指定
 *     URL::forceScheme('https');
 * }
*/