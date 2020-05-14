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
Route::get('/formatCv','ProfileController@cvFormat')->middleware('StudentRole');;
Route::get('/getInputs/{item}','ProfileController@getInput');
Route::post('uploadCv', 'ProfileController@CvUploadPost')->name('upload.cvToCheck');


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
Route::group(['middleware' => 'PlacementRole'],function(){
    Route::get('/placement','PagesController@placementHome');
    Route::post('/sendMessage','MessageController@sendMessage');
    Route::get('/allStudent','EditController@allStudent');
    Route::get('/allJobs','EditController@allJobs');
    Route::get('/allCourses','EditController@allCourses');
    Route::get('/cv','EditController@addCvFormat');
    Route::get('/addStudents','EditController@addStudents');
    Route::get('/addEmployers','EditController@addEmployers');
    Route::post('/CreateStudent','EditController@createStudents')->name('upload.students');
    Route::post('/CreateEmployers','EditController@createEmployers')->name('upload.employers');
    Route::post('/getCategory','EditController@getCategory');
    Route::post('/confirm','MessageController@confirm');
    Route::post('/editCourse','EditController@editCourse');
    Route::post('/editCategory','EditController@editCategory');
    Route::delete('/deleteCourse','EditController@deleteCourse');
    Route::delete('/deleteCategory','EditController@deleteCategory');
    Route::post('/cv-upload','EditController@uploadCvFormat')->name('upload.cvFormat');;
});




//admin routes
Route::get('/admin','PagesController@adminHome')->middleware('AdminRole');
Route::get('/createCourse','EditController@createCourseIndex')->middleware('AdminRole');;
Route::get('/allStudents','EditController@allStudent')->middleware('AdminRole');
Route::get('/allJobPosts','EditController@allJobs')->middleware('AdminRole');;
Route::get('/Courses','EditController@allCourses')->middleware('AdminRole');
Route::post('/createCourse','EditController@createCourse')->middleware('AdminRole');
Route::post('/disabled','EditController@disabled');
Route::get('/addPlacement','EditController@addPlacementIndex')->middleware('AdminRole');
Route::post('/CreatePlacement','EditController@createPlacement')->name('upload.placement');




//global routes
Route::post('/addLike','LikeController@insert');
Route::get('/buildProfile/{id}','ProfileController@showWizardProfile');
Route::get('/getMessage/{id}/{type}','MessageController@getMessages');
Route::get('/getMessageCount/{id}','MessageController@getCountMessages');
Route::post('/confirmMessages','MessageController@confirmMessages');
Route::get('/status','StatusController@getStatus')->middleware('cors');;
Route::post('/SaveTheDate','LikeController@saveThedate');
Route::post('/status','LikeController@updateStatus');
