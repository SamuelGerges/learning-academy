<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function scopeSelection($query)
    {
        return $query->select('id','name','logo','favicon','city','address','phone','work_hours','email','map');
    }
}
