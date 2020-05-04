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

//student routes

Route::get('/student','PagesController@studentHome')->middleware('StudentRole');
Route::post('profile/update','ProfileController@update');
Route::get('/profile/{id}','ProfileController@show')->name('myProfile')->middleware('StudentRole');
Route::delete('/profile/reset','ProfileController@reset');
Route::post('image-upload', 'ProfileController@imageUploadPost')->name('image.upload.post');

//employer routes
Route::get('/employer','PagesController@employerHome')->middleware('EmployerRole');
Route::get('/job/create','JobController@showForm')->middleware('EmployerRole');;
Route::post('/job/create','JobController@create');
Route::post('/courseId','JobController@getCategory');
Route::post('/getJobs','JobController@getAllJobs');
Route::get('/editJob/{id}/course/{course_id}','JobController@editJob')->middleware('EmployerRole');;
Route::put('/job/update','JobController@updateJob');
Route::post('/studentCategory','JobController@studentByCategory');
Route::get('job/delete/{id}', 'JobController@destroy')->middleware('EmployerRole');;
Route::post('/profileStudent','JobController@showStudent');

//placement routes
Route::get('/placement','PagesController@placementHome')->middleware('PlacementRole');
Route::post('/sendMessage','MessageController@sendMessage');
Route::get('/allStudent','EditController@allStudent')->middleware('PlacementRole');;
Route::get('/allJobs','EditController@allJobs')->middleware('PlacementRole');;
Route::get('/allCourses','EditController@allCourses')->middleware('PlacementRole');;
Route::post('/getCategory','EditController@getCategory');
Route::post('/confirm','MessageController@confirm');
Route::post('/editCourse','EditController@editCourse');
Route::post('/editCategory','EditController@editCategory');
Route::delete('/deleteCourse','EditController@deleteCourse');
Route::delete('/deleteCategory','EditController@deleteCategory');
Route::get('/createCourse','EditController@createCourseIndex')->middleware('PlacementRole');;
Route::post('/createCourse','EditController@createCourse');



//global routes
Route::post('/addLike','LikeController@insert');
Route::get('/buildProfile/{id}','ProfileController@showWizardProfile');
Route::get('/getMessage/{id}/{type}','MessageController@getMessages');
Route::get('/getMessageCount/{id}','MessageController@getCountMessages');
Route::post('/confirmMessages','MessageController@confirmMessages');

