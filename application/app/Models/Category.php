<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->hasMany(Course::class);
    }
    // public function episodes()
    // {
    //     return $this->hasMany(Episode::class);
    // } 

    


}
