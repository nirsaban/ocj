<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use App\User;
use http\Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {

        $profile = [];
        $profile['name'] = User::find($id)->value('name');
        $profile['cat_name'] = Category::select('cat_name')->where('id',User::find($id)->profile()->value('category_id'))->value('cat_name');
        $profile['allData'] = Profile::where('user_id',$id)->get();
        $profile['categories'] = Category::all()->toArray();
        return view('student.profile',$profile);
    }
    public function update(Request $request,$id){

        $col = $request->item;
        $val = $col == 'category_id' ? json_encode($request->value): $request->value;
        $id = json_decode($id);
        if(Profile::updateOrCreate(['user_id' => $id],["$col" => $val])){
            return response('success update', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something failed', 500)->header('Content-Type', 'text/plain');
        }
    }

}
