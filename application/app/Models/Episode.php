<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
        public function categoryDetails()
        {
            return $this->belongsTo(CategoryDetails::class,'cat_details_id');
        }


}
