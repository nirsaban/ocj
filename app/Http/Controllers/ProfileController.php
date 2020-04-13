<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(Request $request,$id)
    {

        $profile = [];
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


        return view('student.profile',$profile);
    }
    public function update(Request $request){
        $col = $request->item;
        $val = $col == 'category_id' ? json_encode($request->value): $request->value;
        $id = json_decode($request->id);
        if(Profile::updateOrCreate(['user_id' => $id],["$col" => $val])){
            return response('success update', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something failed', 500)->header('Content-Type', 'text/plain');
        }
    }


    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName =   $_FILES['image']['name'];
        $request->image->move(public_path('images/_'.Auth::id()), $fileName);
        $col = $request->item;
        $id = json_decode($request->id);
        if(Profile::updateOrCreate(['user_id' => $id],["image" => $fileName])){
            return redirect('profile/'.Auth::id());
        }else{
            return redirect('welcome');
        }

    }
}
