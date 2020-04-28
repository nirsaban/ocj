<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Job;
use App\Like;
use App\Message;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
  public function studentHome(){
      $userCategory = Profile::whereUserId(Auth::id())->value('category_id');
      $allJobs = $userCategory != null ? Job::with('category')->where('category_id',$userCategory)->where('confirm','=',true)->get() : Job::where('course_id',Auth::user()->course_id)->where('confirm',true)->get();
      $title = 'Find your dream job';
      $second_title = User::find(Auth::id())->course()->value('name');
      return view('student.home', compact( 'allJobs',  'title','userCategory','second_title'));
  }
  public function employerHome(){
     $jobs = Job::with('category','course')->where('user_id',Auth::id())->get();
     $title = 'Find new student ';
     $second_title = 'sort by course';
     $courses = Job::join('courses', 'jobs.course_id', '=', 'courses.id')->where('user_id',Auth::id())->get()->toArray();
     $courses = array_unique($courses,SORT_REGULAR);
     return view('employer.home', compact('title','second_title','courses'));
  }
  public function placementHome(){
      $title = "Hey ". Auth::user()->name ." see all match and send messages ";
      $matches = DB::select(' SELECT s.love,s.beloved AS \'studentLike\', j.love ,j.beloved AS \'jobLike\' FROM likes s ,likes j WHERE s.rilation <> j.rilation AND  j.love = s.beloved AND s.love = j.beloved ORDER BY `studentLike`');
      $allMatches = [];
        for($i = 0; $i < count($matches)/2; $i++ ){
           array_push($allMatches,$matches[$i]);
        }
        $perfectMatches = [];
        foreach ($allMatches as $index => $item){
            $jobArr = Job::with('user','course','category')->where('id',$item->jobLike)->get()->toArray();
            $stuArr = User::with('profile')->where('id',$item->studentLike)->get()->toArray();
            $merge = array_merge($jobArr,$stuArr);
            $perfectMatches[$index]  = $merge ;
        }
       $courses = [];
       foreach ($perfectMatches  as $course){
           array_push($courses,$course[0]['course']);

       }
      $courses = array_unique($courses,SORT_REGULAR);
       for ($i = 0;  $i < count($perfectMatches);  $i++){
           $message =  Message::where('student_id',$perfectMatches[$i][1]['id'])->where('job_id',$perfectMatches[$i][0]['id'])->get();
           if(count($message) == 2){
               $perfectMatches[$i][0]['message'] = 'full';
           }else if(count($message) == 1){
               $perfectMatches[$i][0]['message'] = 'half';
           }else if(count($message) == 0){
               $perfectMatches[$i][0]['message'] = 'empty';
           }

       }
        return view('placement.placementHome',compact('perfectMatches','title','courses'));
  }
}

