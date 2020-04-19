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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/student','PagesController@studentHome');
Route::get('/placement','PagesController@placementHome');
Route::get('/employer','PagesController@employerHome');

Route::post('profile/update','ProfileController@update');
Route::get('/profile/{id}','ProfileController@show');
Route::delete('/profile/reset','ProfileController@reset');
Route::post('image-upload', 'ProfileController@imageUploadPost')->name('image.upload.post');
Route::post('/addLike','LikeController@insert');
Route::get('/job/create','JobController@showForm');
Route::post('/job/create','JobController@create');
Route::post('/courseId','JobController@getCategory');

