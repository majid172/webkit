<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    public function subscription()
    {
        return $this->hasMany(Subscription::class,'course_id');
    }
}
