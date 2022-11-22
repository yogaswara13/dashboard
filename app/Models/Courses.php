<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public function lectures(){
        return $this->hasMany('App\Models\Lectures', 'lecture_id', 'id');
    }
    
    public function study_programs(){
        return $this->belongsTo('App\Models\Study_program', 'course_id');
    }
    

}
