<?php

namespace App\Http\Controllers;

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
}
