<?php

namespace App\Http\Controllers;

use App\Course;
use App\Job;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
  public function studentHome(){
      $userCategory = Profile::whereUserId(Auth::id())->value('category_id');
      $allJobs = $userCategory != null ? Job::where('category_id',$userCategory)->get() : Job::where('course_id',Auth::user()->course_id)->get();
      $title = 'Find your dream job';
      $second_title = User::find(Auth::id())->course()->value('name');
      return view('student.home', compact( 'allJobs',  'title','userCategory','second_title'));
  }
  public function employerHome(){
    if(isset($_GET['id'])){
        $jobs = Job::where('user_id',Auth::id())->where('course_id',$_GET['id'])->get();
    }
      $jobs = Job::where('user_id',Auth::id())->get();
     $title = 'Find new student ';
     $second_title = 'sort by course';
     $courses = Job::join('courses', 'jobs.course_id', '=', 'courses.id')->select(['courses.name','courses.id'])->get()->toArray();
     $courses = array_unique($courses,SORT_REGULAR);
     return view('employer.home', compact('jobs','title','second_title','courses'));
  }
}

