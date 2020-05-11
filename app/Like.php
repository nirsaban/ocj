<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $guarded = [];
    public function user(){
        return $this->belongsTo(User::class,'love','id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'beloved','id');
    }


}
