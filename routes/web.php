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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/Dancers', 'PostController@index');  //投稿一覧の表示
    
    Route::get('/Dancers/create', 'PostController@create'); //投稿フォーム表示
    Route::post('/Dancers/create', 'PostController@store'); //動画投稿の登録
    Route::put('/Dancers/{post}', 'PostController@update');  //投稿更新
    Route::delete('/Dancers/{post}', 'PostController@delete'); //投稿削除
    Route::get('/Dancers/edit/{post}', 'PostController@edit');  //更新画面の表示
    Route::get('/Dancers/calendar/{post}', 'PostController@calendar'); //カレンダー画面表示
    Route::get('/Dancers/{post}', 'PostController@show');  //詳細画面の表示
    Route::get('/Dncers/category/{category}', 'PostController@category'); //ジャンル別の投稿画面の表示
    Route::get('/test', 'CommentController@test');
    
    //コメント機能
    Route::get('/Dancers/{post}/comment/create', 'CommentController@commentCreate'); //コメント投稿フォーム
    Route::post('/Dancers/comment/create', 'CommentController@commentStore'); //コメント保存処理
    Route::delete('/Dancers/{comment}/comment', 'CommentController@delete'); //コメント消去処理
    
    //イベント登録
    Route::post('/eventAdd', 'ScheduleController@eventAdd');
});    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
