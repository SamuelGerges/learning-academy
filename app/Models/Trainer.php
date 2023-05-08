<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSelection($query)
    {
        return $query->select('id','name','phone','spec','image');
    }
    public function courses()
    {
        return $this->hasMany(Course::class,'trainer_id');
    }



}
