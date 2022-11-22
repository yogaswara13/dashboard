<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_program extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany('App\Models\Student', 'study_program_id', 'id');
    }
        
    public function courses(){
        return $this->hasMany('App\Models\Student', 'course_id', 'id');
    }
        
}
