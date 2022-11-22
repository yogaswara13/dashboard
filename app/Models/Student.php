<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function study_programs(){
        return $this->belongsTo('App\Models\Study_program', 'study_program_id');
    }
}
