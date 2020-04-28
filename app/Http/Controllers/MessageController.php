<?php

namespace App\Http\Controllers;

use App\Job;
use App\Message;
use App\Profile;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request){

       $checkMessage = Message::where('user_id',json_decode($request->user_id))->where('student_id',json_decode($request->student_id))->where('job_id',json_decode($request->job_id))->first();
       if(!$checkMessage or $request->job_id == null){
           $message = new Message;
           $message->user_id = json_decode($request->user_id);
           $message->message = $request->message;
           $message->student_id = json_decode($request->student_id);
           $message->job_id = json_decode($request->job_id);
           if($message->save()){
               return response('your message as been send successfully',201)->header('Content-Type', 'text/plain');
           };
       }else{
           return response('you dont sent more than one message to this match',201)->header('Content-Type', 'text/plain');
       }

    }
    public function confirm(Request $request){
       if($request->type == 'student'){
           $confirm = Profile::where('user_id',json_decode($request->id))->update(['confirm'=>json_decode($request->bool)]);
           if($confirm){
               return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
           }else{
               return response('something warng',500)->header('Content-Type', 'text/plain');
           }
       }else{
           $confirm = Job::where('id',json_decode($request->id))->update(['confirm'=>json_decode($request->bool)]);
           if($confirm){
               return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
           }else{
               return response('something warng',500)->header('Content-Type', 'text/plain');
           }
       }
    }
}
