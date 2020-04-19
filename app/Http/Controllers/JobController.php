<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\JobRequest;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function showForm(){
        $courses = Course::all();
        return view('employer.create',compact('courses'));
    }
    public function create(JobRequest $request){
       Job::create(['user_id'=>Auth::id()] +  $request->all());
       return redirect('/employer');
    }
    public function getCategory(Request $request){
        $id = json_decode($request->id);
        $categories = Category::where('course_id',$id)->get();
        return view('employer/partials/selectCategory',compact('categories'));
    }
    public function getInput(Request $request){
        return view('employer/partials/requireInput');
    }
}
