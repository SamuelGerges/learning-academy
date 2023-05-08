<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    use Upload;
    public function index()
    {
        $data['courses'] = Course::select()->orderBy('id','DESC')->get();
        return view('admin.courses.index',$data);
    }

    public function create()
    {
        $data['categories'] = Category::select()->get();
        $data['trainers'] = Trainer::select()->get();
        return view('admin.courses.create',$data);
    }

    public function store(CourseRequest $request)
    {
        $imageName = '';
        if ($request->has('image')) {
            $imageName = $this->uploadImage($request->image, 'courses');

        }
        $course = Course::create([
            'category_id' => $request->input('category_id'),
            'trainer_id' => $request->input('trainer_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'small_desc' => $request->input('small_desc'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);

        if(!$course)
            return back();
        return redirect()->route('admin.showCourse');
    }


    public function edit($id)
    {
        $data['course'] = Course::findOrFail($id);
        if (!$data['course'])
            return back();
        $data['categories'] = Category::select()->get();
        $data['trainers'] = Trainer::select()->get();
        return view('admin.courses.edit',$data);
    }

    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        if (!$course)
            return back();

        $imageName = '';
        if($request->hasFile('image')){
            Storage::disk('courses')->delete($course->image);
            $imageName = $this->uploadImage($request->image, 'courses');
        }
        else{
            $imageName = $course->image;
        }

        $updatedCourse = $course->update([
            'category_id' => $request->input('category_id'),
            'trainer_id' => $request->input('trainer_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'small_desc' => $request->input('small_desc'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);

        if(!$updatedCourse)
            return back();
        return redirect()->route('admin.showCourse');

    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        Storage::disk('courses')->delete($course->image);
        $deletedCourse = $course->delete();
        if(!$deletedCourse)
            return back();
        return redirect()->route('admin.showCourse') ;
    }



}
