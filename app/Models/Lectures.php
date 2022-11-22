<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

        public function courses(){
            return $this->belongsTo('App\Models\Courses', 'lectures_id');
        }
        public function attendances(){
            return $this->hasMany('App\Models\Attendances', 'lectures_id');
        }
}
