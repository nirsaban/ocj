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
    public function studentByCategory(Request $request){

        $id = json_decode($request->category_id);
        $students = Profile::with('user','category')->where('category_id',$id)->where('confirm','=',true)->get();
        $title = count($students) > 0 ? 'Find the best student for your job !' : 'Sorry, no students from this category have been found yet :( ';
        $job_id = json_decode($request->job_id);
        return view('employer.studentsByCategory',compact('students','title','job_id'));
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
    public function showStudent(Request $request){
        $profile = [];
        $id = json_decode($request->id);
        $profile['name'] = User::find($id)->name;
        $profile['cat_name'] = Category::select('cat_name')->where('id',User::find($id)->profile()->value('category_id'))->value('cat_name');
        $profile['categories'] = Category::all()->toArray();
        $profile['allData'] = Profile::where('user_id',$id)->get();
        $presentAll = Profile::where('user_id',$id)->get(['category_id','about_me', 'education', 'my_skills', 'links','work_experience','image'])->toArray();
        if (isset($presentAll[0])){
            foreach ($presentAll[0] as $key => $value){
                if($value != null){
                    $present[$key] = $value;
                }
            }
            $profile['present'] = $present;
        }
        $profile['id'] = $id;
        $profile['job_id'] = $request->job_id;

        return view('employer.StudentByCategory',$profile);
    }

}
