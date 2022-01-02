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
    Route::get('home', 'App\Http\Controllers\TopController@index' )->name('home');
    Route::get('recommend', 'App\Http\Controllers\TopController@recommend')->name('recommend.music');
    Route::get('following/artists', 'App\Http\Controllers\TopController@followingArtists')->name('following.artists');
    Route::get('{id}/top', 'App\Http\Controllers\ArtistsController@show')->name('artist.top');
    Route::get('music/{id}', 'App\Http\Controllers\MusicController@show')->name('music');
    Route::get('gift/select/', 'App\Http\Controllers\GiftController@show')->name('gift.select');
    Route::get('gift/form/{id}/form', 'App\Http\Controllers\GiftController@form')->name('gift.form');

    Route::get('gift/form/{id}/users', 'App\Http\Controllers\GiftController@userSelect')->name('gift.form.user.select');
    Route::post('gift/form/{id}/users', 'App\Http\Controllers\GiftController@userSelect')->name('gift.form.user.search');
    Route::get('gift/form/{id}/users/store', 'App\Http\Controllers\GiftController@userStore')->name('gift.form.user.store');
    Route::post('gift/form/{id}/users/store', 'App\Http\Controllers\GiftController@userStore');
    Route::get('/gift/form/{id}/form/store', 'App\Http\Controllers\GiftController@music')->name('gift.store');
    Route::post('/gift/form/{id}/form/store', 'App\Http\Controllers\GiftController@music');

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

    Route::get('mymusic/show/{id}', 'App\Http\Controllers\UserController@music')->name('mymusic.show');

    Route::get('/announcement','App\Http\Controllers\AnnouncementController@show')->name('announcement');
    Route::get('/announcement/{id}','App\Http\Controllers\AnnouncementController@read')->name('announcement.read');

    Route::get('/setting','App\Http\Controllers\EditAccountController@index')->name('setting');
    Route::get('/setting/artist','App\Http\Controllers\EditArtistAccountController@index')->name('setting.artist');

    Route::get('/follow/requests','App\Http\Controllers\FollowController@requests')->name('follow.requests');
    Route::get('/followrequest/user/{id}','App\Http\Controllers\FollowController@request')->name('followrequest.user');
    Route::get('/followrequest/allow/{id}','App\Http\Controllers\FollowController@allow')->name('followrequest.allow');
    Route::get('/followrequest/block/{id}','App\Http\Controllers\FollowController@block')->name('followrequest.block');

    Route::get('/editaccount/{id}','App\Http\Controllers\EditAccountController@edit')->name('account.edit');
    Route::post('/editaccount/update', 'App\Http\Controllers\EditAccountController@update')->name('account.update');
    Route::get('/user/private/{id}','App\Http\Controllers\EditAccountController@private')->name('user.private');
    Route::post('/user/private/update','App\Http\Controllers\EditAccountController@privateUpdate')->name('user.private.update');

    Route::get('/purchase/gift/','App\Http\Controllers\GiftController@purchase')->name('purchase.gift');
    Route::get('/purchase/gift/store/','App\Http\Controllers\GiftController@store')->name('purchase.gift.store');
    Route::post('/purchase/gift/store/','App\Http\Controllers\GiftController@store');
    
    Route::get('register/confirm', function(){
        return view('ruts.usercomfirm');
        })->name('register.comfirm');
      
    Route::get('/register/2', function(){
        return view('ruts.userimage');
        })->name('register.2');
        
    Route::post('/register/2','App\Http\Controllers\adduserController@storeMyImg');
});    

Route::get('artist/login','App\Http\Controllers\Auth\ArtistLoginController@loginView')->name('artist.login');
Route::post('artist/login','App\Http\Controllers\Auth\ArtistLoginController@login')->name('artist.login.post');

Route::get('admin/login','App\Http\Controllers\Auth\AdminLoginController@loginView')->name('admin.login');
Route::post('admin/login','App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.post');

//Artist権限をつける
Route::group(['middleware' => ['artist']], function(){

    Route::get('posts/show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::get('posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::get('posts/store', 'App\Http\Controllers\PostController@store');
    Route::post('posts/store', 'App\Http\Controllers\PostController@store');


    Route::get('posts/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('posts/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::delete('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy');

    Route::get('/profile/artist', 'App\Http\Controllers\ArtistsController@profile')->name('profile.artist');
    Route::post('artist/logout', 'App\Http\Controllers\Auth\ArtistLoginController@logout')->name('artist.logout');
});


Route::group(['middleware' => ['admin']], function(){
    //dashboard
    Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard'); 
    //music
    Route::get('admin/music', 'App\Http\Controllers\AdminPostController@index')->name('admin.music.index');
    Route::get('admin/music/edit/{id}', 'App\Http\Controllers\AdminPostController@edit')->name('admin.music.edit');
    Route::post('admin/music/update', 'App\Http\Controllers\AdminPostController@update')->name('admin.music.update');
    Route::delete('admin/music/delete/{id}', 'App\Http\Controllers\AdminPostController@destroy')->name('admin.music.delete');

    //User
    Route::get('admin/user', 'App\Http\Controllers\AdminUserController@index')->name('admin.user.index');
    Route::get('admin/user/edit/{id}','App\Http\Controllers\AdminUserController@edit')->name('admin.user.edit');
    Route::post('admin/user/update', 'App\Http\Controllers\AdminUserController@update')->name('admin.user.update');
    Route::delete('admin/user/delete/{id}', 'App\Http\Controllers\AdminUserController@destroy')->name('admin.user.delete');

    //Artist
    Route::get('admin/artist', 'App\Http\Controllers\AdminArtistController@index')->name('admin.artist.index');
    //follow
    Route::get('admin/follow', 'App\Http\Controllers\AdminFollowController@index')->name('admin.follow.index');
    //gift
    Route::get('admin/gift', 'App\Http\Controllers\AdminGiftController@index')->name('admin.gift.index');
    //ticket
    Route::get('admin/ticket', 'App\Http\Controllers\AdminTicketController@index')->name('admin.ticket.index');
});

Auth::routes();
