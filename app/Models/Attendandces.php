<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendandces extends Model
{
    use HasFactory;

    public function lectures(){
        return $this->belongsTo('App\Models\Lectures', 'lectures_id');
    }
}
