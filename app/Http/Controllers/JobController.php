<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\JobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function showForm(){
        $courses = Course::all();
        return view('employer.create',compact('courses'));
    }
    public function create(JobRequest $request){
        json_decode($request->category_id);
        json_decode($request->course_id);
       Job::create(['user_id'=>Auth::id()] +  $request->all());
       return redirect('/employer');
    }
    public function getCategory(Request $request){
        $id = json_decode($request->id);
        $categories = Category::where('course_id',$id)->get();
        return view('employer/partials/selectCategory',compact('categories'));
    }

    public function getAllJobs(Request $request){
        $id = json_decode($request->id);
         if($request->courseId != null){
             $course_id = json_decode($request->courseId);
             return Job::with('category','course')->where('user_id',$id)->where('course_id',$course_id)->get();
         }else{
             return Job::with('category','course')->where('user_id',$id)->get();
         }
    }
    public function editJob($id,$courseId){

        $job = Job::find($id);
        $categories =  Category::where('course_id',json_decode($courseId))->get();
        return view('employer.editJob',compact('job','categories'));
    }
    public  function updateJob(UpdateJobRequest $request){
             $updated =  Job::where('id',json_decode($request->id))->update(['category_id' => json_decode($request->category_id),
            'company'=> $request->company,'title'=> $request->title,'description'=>$request->description,
            'requirements'=> $request->requirements,'salary'=>$request->salary,'location'=>$request->location,
            'email'=>$request->email,'phone'=> $request->phone]);
            if($updated){
                return redirect('/employer');
            }
    }
    public function studentByCategory($category_id){
        $id = json_decode($category_id);
        $students = Profile::with('user','category')->where('category_id',$id)->get();
        return view('employer.studentsByCategory',compact('students'));
    }
    public function destroy($id)
    {
       $job = Job::find($id)->delete();
        if($job){
            return response('your post deleted successfully', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something warn', 500)->header('Content-Type', 'text/plain');
        }
    }
}
