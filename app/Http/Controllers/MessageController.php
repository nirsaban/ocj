<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
       $checkMessage = Message::where('user_id',json_decode($request->user_id))->where('student_id',json_decode($request->student_id))->where('job_id',json_decode($request->job_id))->first();
       if(!$checkMessage){
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
}
