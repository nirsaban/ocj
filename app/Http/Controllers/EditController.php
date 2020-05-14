<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Job;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EditController extends Controller
{
    public function addPlacementIndex(){
        return view('admin.createPlacement');
    }
   public function createPlacement(Request $request){
       $validator = Validator::make($request->all(),[
           'file'=> 'required',
       ],
           [
               'file.required'=>'you must choose Exel file before sending',
           ]);
       if($validator->fails()){
           return redirect()->back()->withErrors($validator);
       }
       $file = $request->file('file');
       $csvData = file_get_contents($file);
       $rows = array_map('str_getcsv',explode("\n",$csvData));
       $header = array_shift($rows);
       foreach ($rows as $row){
           $row = array_combine($header,$row);
           if(User::where('email',$row['email'])->first() != null){
               $name = $row['name'];
               return Redirect::back()->withErrors(["$name have an account please remove from exel file"]);
           }
           User::create([
               'name'=>$row['name'],
               'email'=> $row['email'],
               'password'=>bcrypt($row['password']),
               'role'=>'placement',
           ]);
       }
       return redirect()->back()->with('message', 'Placement add!!');
   }
    public function addStudents(){
        $courses = Course::all()->toArray();
        return view('placement.addStudent',compact('courses'));
    }
    public function addEmployers(){

        return view('placement.addEmployer');
    }
    public function createStudents(Request $request){

          $validator = Validator::make($request->all(),[
               'fileStudent'=> 'required',
                'course_id'=>'required'
          ],
          [
              'file.required'=>'you must choose Exel file before sending',
              'course_id.required'=>'you must choose Course from dropdown before sending'
          ]);
          if($validator->fails()){
              return redirect()->back()->withErrors($validator);
          }

          $file = $request->file('fileStudent');
          $csvData = file_get_contents($file);
          $rows = array_map('str_getcsv',explode("\n",$csvData));
            $header = array_shift($rows);
            foreach ($rows as $row){
                $row = array_combine($header,$row);
                if(User::where('email',$row['email'])->first() != null){
                    $name = $row['name'];
                    return Redirect::back()->withErrors(["$name have an account please remove from exel file"]);
                }
                User::create([
                    'name'=>$row['name'],
                    'email'=> $row['email'],
                    'password'=>bcrypt($row['password']),
                    'role'=>'student',
                    'course_id' =>   $request->course_id
                ]);
            }
        return redirect()->back()->with('message', 'Students add!!');
        }

    public function createEmployers(Request $request){

        $validator = Validator::make($request->all(),[
            'file'=> 'required',
        ],
            [
                'file.required'=>'you must choose Exel file before sending',
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('file');
        $csvData = file_get_contents($file);
        $rows = array_map('str_getcsv',explode("\n",$csvData));
        $header = array_shift($rows);
        foreach ($rows as $row){
            $row = array_combine($header,$row);
            if(User::where('email',$row['email'])->first() != null){
                $name = $row['name'];
                return Redirect::back()->withErrors(["$name have an account please remove from exel file"]);
            }
            User::create([
                'name'=>$row['name'],
                'email'=> $row['email'],
                'password'=>bcrypt($row['password']),
                'role'=>'employer',
            ]);
        }
        return redirect()->back()->with('message', 'Employers add!!');

    }
       public function addCvFormat(){
           $courses = Course::all();
           return view('placement.cvFormat',compact('courses'));
       }
    public function disabled(Request $request){
        $job = Job::where('id',$request->jobId)->update(['confirm'=>false]);
        $student = Profile::where('user_id',$request->userId)->update(['confirm'=>false]);
        if($student && $job) {
            return response('updated successfully', 201);
        }else{
            return response('something falid',200);
        }
    }
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
        if(Auth::user()->role == 'admin'){
            return view('admin.allCourses',compact('categories','courses','countCourseJob','countCourseUser','countCategoryUser','countCategoryJob','checkCourses'));
        }else{
            return view('placement.allCourses',compact('categories','courses','countCourseJob','countCourseUser','countCategoryUser','countCategoryJob','checkCourses'));
        }

    }
    public function allJobs(){
        $jobs = Job::with('user','course','category')->get()->toArray();
        if(Auth::user()->role == 'admin'){
            return view('admin.allJobs',compact('jobs'));
        }else{
            return view('placement.allJobs',compact('jobs'));
        }

    }
    public function allStudent(){
        $allStudents = User::with('course','profile')->where('role','student')->get()->toArray();
        $allStudent = [];
        foreach ($allStudents as $student){
            if($student['profile']){
               array_push($allStudent,$student);
            }
        }
        if(Auth::user()->role == 'admin'){
            return view('admin.allStudent',compact('allStudent'));
        }else{
            return view('placement.allStudent',compact('allStudent'));
        }


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
    public function uploadCvFormat(Request $request){
        $validator = Validator::make($request->all(),[
            'cv'=> 'required',
            'course_id'=>'required'
        ],
        [
            'cv.required'=>'you must choose Pdf file before sending',
            'course_id.required'=>'you must choose Course from dropdown before sending'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $fileName =   $_FILES['cv']['name'];
        $request->cv->move(public_path('cvFormat/_'.$request->course_id), $fileName);
        $id = json_decode($request->course_id);
        if(Course::where('id',$id)->update(["cvFormat" => $fileName])){
            return redirect()->back()->with('message', 'Cv add!!');
        }else{
            return redirect('/placement');
        }
    }


}
