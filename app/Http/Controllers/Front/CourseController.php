<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourseByCategoryId($id)
    {
        $data['category'] = Category::where('id',$id)->first();
        $data['courses'] = Course::where('category_id',$id)->paginate(3);
        return view('site.courses.category',$data);
    }


    public function getCourseById($category_id,$course_id)
    {
        $data['course'] = Course::where(['id' => $course_id,'category_id' => $category_id])->first();
        return view('site.courses.index',$data);

    }
}
