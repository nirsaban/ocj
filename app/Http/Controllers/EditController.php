<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Job;
use App\Profile;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class EditController extends Controller
{

    public function allCourses(){
        $checkCourses = Course::with('category','user','job')->get()->toArray();
        if(!$checkCourses){
            return redirect('/placement');
        }
        $courses = Course::with('category','user','job')->get()->toArray();
        $categories = Category::with('profile','job')->get()->toArray();
        foreach ($courses as $course){
            $countCourseUser[$course['name']] = count($course['user']) ;
            $countCourseJob[$course['name']] = count($course['job']) ;
        }
        foreach ($categories as $category){
            $countCategoryUser[$category['cat_name']] = count($category['profile']) ;
            $countCategoryJob[$category['cat_name']] = count($category['job'])  ;
        }
        return view('placement.allCourses',compact('categories','courses','countCourseJob','countCourseUser','countCategoryUser','countCategoryJob','checkCourses'));
    }
    public function allJobs(){
        $jobs = Job::with('user','course','category')->get()->toArray();
        return view('placement.allJobs',compact('jobs'));
    }
    public function allStudent(){
        $allStudent = User::with('course','profile')->where('role','student')->get()->toArray();
        return view('placement.allStudent',compact('allStudent'));

    }
    public function getCategory(Request $request){
        $category = Profile::with('category')->where('user_id',json_decode($request->id))->get()->toArray();
        return $category[0]['category']['cat_name'];
    }
    public function editCourse(Request $request){
        if(strlen($request->course) < 2 ){
            return response('you must give min 2 characters',200);
        }else{
             $updateCourse =  Course::where('id',json_decode($request->id))->update(['name'=>$request->course]);
            if($updateCourse){
                return response('success updated',201);
            }else{
                return  response('something faild',200);
            }
        }

    }
    public function editCategory(Request $request){
        if(strlen($request->category) < 2 ){
            return response('you must give min 2 characters',200);
        }else{
            $updateCategory=  Category::where('id',json_decode($request->id))->update(['cat_name'=>$request->category]);
            if($updateCategory){
                return response('success updated',201);
            }else{
                return  response('something faild',200);
            }
        }

    }
    public function deleteCourse(Request $request){
        Course::where('id',json_decode($request->id))->delete();
        Job::where('course_id',json_decode($request->id))->delete();
        Category::where('course_id',json_decode($request->id))->delete();
        User::where('course_id',json_decode($request->id))->delete();
        return response('all from this course as been deleted',201);
    }
    public function createCourseIndex(){
        $checkCourses = Course::with('category','user','job')->get()->toArray();
        return view('admin.createCourse');
    }
    public function createCourse(Request $request){
        $course = new Course ;
        $course->name = $request->course;
        if($course->save()){
          foreach ($request->categories as $category){
              $categories = Category::create(['cat_name'=>$category,'course_id'=>$course->id]);
          }
          if($categories){
              return response('success creating course and category ',201);
          }else{
              return response('something faild',200);
          }
        }else{
            return response('something faild',200);
        }
    }
    public function deleteCategory(Request $request){
        Job::where('category_id',json_decode($request->id))->delete();
        Category::where('id',json_decode($request->id))->delete();
        Profile::where('category_id',json_decode($request->id))->delete();
        return response('all from this course as been deleted',201);
    }
}
