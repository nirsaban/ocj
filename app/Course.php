<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
