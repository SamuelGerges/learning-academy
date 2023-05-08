<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('status');
    }

    public function scopeSelection($query)
    {
        return $query->select('id','category_id','course_id','name','small_desc','desc','image','price');
    }
}
