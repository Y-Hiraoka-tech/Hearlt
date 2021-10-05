<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/register/artist', 'App\Http\Controllers\ArtistRegisterController@create' )->name('register.artist');
    Route::get('/register/artist/store', 'App\Http\Controllers\ArtistRegisterController@store');
    Route::post('/register/artist/store', 'App\Http\Controllers\ArtistRegisterController@store');
    Route::get('/register/artist/2', 'App\Http\Controllers\ArtistRegisterController@create2' )->name('register.artist.2');
    Route::get('/register/artist/store/2', 'App\Http\Controllers\ArtistRegisterController@store2');
    Route::post('/register/artist/store/2', 'App\Http\Controllers\ArtistRegisterController@store2');

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

//home画面からの遷移
    Route::get('home', 'App\Http\Controllers\ArtistsController@index' )->name('home');
    Route::get('{id}/top', 'App\Http\Controllers\ArtistsController@show')->name('artist.top');
    Route::get('music/{id}', 'App\Http\Controllers\MusicController@show')->name('music.id');
    Route::get('gift/select/', 'App\Http\Controllers\GiftController@show')->name('gift.select');
    Route::get('gift/form/{id}/form', 'App\Http\Controllers\GiftController@form')->name('gift.form');
    Route::get('gift/form/{id}/form/{gifted_user_id}', 'App\Http\Controllers\GiftController@form')->name('gift.form.gifted');

    Route::get('gift/form/{id}/users', 'App\Http\Controllers\GiftController@userSelect')->name('gift.form.user.select');
    Route::get('gift/form/{id}/users/store', 'App\Http\Controllers\GiftController@userStore')->name('gift.form.user.store');
    Route::post('gift/form/{id}/users/store', 'App\Http\Controllers\GiftController@userStore')->name('gift.form.user.store');
    Route::get('gift/form/store', 'App\Http\Controllers\GiftController@gift');
    Route::post('gift/form/store', 'App\Http\Controllers\GiftController@gift');

//search画面からの遷移
    Route::get('search','App\Http\Controllers\UserController@index')->name('search');
    Route::get('/searchresult','App\Http\Controllers\UserController@search')->name('searchresult');
    Route::get('/follow/user/{id}','App\Http\Controllers\FollowController@userprofile')->name('follow.user');
    Route::get('/follow/user/store/{id}','App\Http\Controllers\FollowController@following')->name('follow.user.store');
    Route::get('/unfollow/user/store/{id}','App\Http\Controllers\FollowController@unfollow')->name('unfollow.user.store');
    //userToArtist
    Route::get('/follow/artist/{id}','App\Http\Controllers\FollowController@artistprofile')->name('follow.artist');
    Route::get('/follow/artist/store/{id}','App\Http\Controllers\FollowController@artistFollowing')->name('follow.artist.store');
    Route::get('/unfollow/artist/store/{id}','App\Http\Controllers\FollowController@artistUnfollow')->name('unfollow.artist.store');

//Community画面からの遷移
    Route::get('community', function(){
        return view('ruts.community');
        })->name('community');

//profile画面からの遷移
    Route::get('/profile', 'App\Http\Controllers\UserController@show')->name('profile');
    Route::get('/profile/artist', 'App\Http\Controllers\ArtistsController@profile')->name('profile.artist');

    Route::get('/setting','App\Http\Controllers\EditAccountController@index')->name('setting');
    Route::get('/setting/artist','App\Http\Controllers\EditArtistAccountController@index')->name('setting.artist');

    Route::get('/follow/requests','App\Http\Controllers\FollowController@requests')->name('follow.requests');
    Route::get('/followrequest/user/{id}','App\Http\Controllers\FollowController@request')->name('followrequest.user');
    Route::get('/followrequest/allow/{id}','App\Http\Controllers\FollowController@allow')->name('followrequest.allow');
    Route::get('/followrequest/block/{id}','App\Http\Controllers\FollowController@block')->name('followrequest.block');

    Route::get('/editaccount/{id}','App\Http\Controllers\EditAccountController@edit')->name('account.edit');
    Route::post('/editaccount/update', 'App\Http\Controllers\EditAccountController@update')->name('account.update');
    Route::get('/user/private/{id}','App\Http\Controllers\EditAccountController@private')->name('user.private');
    Route::post('/user/private/update','App\Http\Controllers\EditAccountController@PrivateUpdatpe')->name('user.private.update');

    Route::get('/purchase/gift/','App\Http\Controllers\GiftController@purchase')->name('purchase.gift');
    Route::get('/purchase/gift/store/','App\Http\Controllers\GiftController@store')->name('purchase.gift.store');
    Route::post('/purchase/gift/store/','App\Http\Controllers\GiftController@store')->name('purchase.gift.store');
    
    Route::get('register/confirm', function(){
        return view('ruts.usercomfirm');
        })->name('register.comfirm');
      
    Route::get('/register/2', function(){
        return view('ruts.userimage');
        })->name('register.2');
        
    Route::post('/register/2','App\Http\Controllers\adduserController@storeMyImg');
});    

Route::get('admin/login','App\Http\Controllers\Auth\AdminLoginController@loginView')->name('admin.login');
Route::post('admin/login','App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.post');

Route::get('artist/login','App\Http\Controllers\Auth\ArtistLoginController@loginView')->name('artist.login');
Route::post('artist/login','App\Http\Controllers\Auth\ArtistLoginController@login')->name('artist.login.post');


//Artist権限をつける
Route::group(['middleware' => ['artist']], function(){
    //これをやるとshowの場合画像などが読み込まれなくなる　why？
    Route::get('posts', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('posts/show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::get('posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::get('posts/store', 'App\Http\Controllers\PostController@store');
    Route::post('posts/store', 'App\Http\Controllers\PostController@store');


    Route::get('posts/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('posts/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::delete('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy');

    Route::get('/profile/artist', 'App\Http\Controllers\ArtistsController@profile')->name('profile.artist');
});


Route::group(['middleware' => ['admin']], function(){
    Route::resource('musics', 'App\Http\Controllers\PostController', ['only' => ['index','show', 'create', 'store',]]);
    Route::get('musics/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('musics/update', 'App\Http\Controllers\PostController@update')->name('music.update');
    Route::delete('musics/delete/{id}', 'App\Http\Controllers\PostController@destroy');

    Route::get('editusers', 'App\Http\Controllers\EditUserController@index')->name('edituser');
    Route::get('editusers/edit/{id}','App\Http\Controllers\EditUserController@edit');
    Route::post('editusers/update', 'App\Http\Controllers\EditUserController@update')->name('user.update');
    Route::delete('editusers/delete/{id}', 'App\Http\Controllers\EdituserController@destroy');
});

Auth::routes();
