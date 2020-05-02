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
Route::post('/getJobs','JobController@getAllJobs');
Route::get('/editJob/{id}/course/{course_id}','JobController@editJob');
Route::put('/job/update','JobController@updateJob');
Route::post('/studentCategory','JobController@studentByCategory');
Route::get('job/delete/{id}', 'JobController@destroy');
Route::post('/profileStudent','JobController@showStudent');
Route::post('/sendMessage','MessageController@sendMessage');
Route::get('/allStudent','EditController@allStudent');
Route::get('/allJobs','EditController@allJobs');
Route::get('/allCourses','EditController@allCourses');
Route::post('/getCategory','EditController@getCategory');
Route::post('/confirm','MessageController@confirm');
Route::post('/editCourse','EditController@editCourse');
Route::post('/editCategory','EditController@editCategory');
Route::delete('/deleteCourse','EditController@deleteCourse');
Route::delete('/deleteCategory','EditController@deleteCategory');
Route::get('/createCourse','EditController@createCourseIndex');
Route::post('/createCourse','EditController@createCourse');

