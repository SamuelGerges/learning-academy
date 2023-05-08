<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SiteContent;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $data['bannerContent']  = SiteContent::select('content')->where('name','banner')->first();
        $data['coursesContent']  = SiteContent::select('content')->where('name','courses')->first();
        $data['courses'] = Course::select()->orderBy('id','desc')->take(3)->get();
        $data['testimonies'] = Testimony::select()->get();
        return view('site.index',$data);
    }
}
