<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function allCourses(){
        $courses = Course::with('category','user','job')->get()->toArray();
        $categories = Category::with('profile','job')->get()->toArray();
        foreach ($courses as $course){
            $countCourseUser[$course['name']] = count($course['user']);
            $countCourseJob[$course['name']] = count($course['job']);
        }
        foreach ($categories as $category){
            $countCategoryUser[$category['cat_name']] = count($category['profile']);
            $countCategoryJob[$category['cat_name']] = count($category['job']);
        }
        return view('placement.allCourses',compact('categories','courses','countCourseJob','countCourseUser','countCategoryUser','countCategoryJob'));
    }
}
