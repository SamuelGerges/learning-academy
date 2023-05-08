<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = Student::select()->orderBy('id','DESC')->get();
        return view('admin.students.index',$data);
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(StudentRequest $request)
    {
        $student = Student::create([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'spec' => $request->input('spec'),
        ]);

        if(!$student)
            return back();
        return redirect()->route('admin.showStudent');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        if(!$student)
            return redirect()->route('admin.showStudent');
        return view('admin.students.edit',compact('student'));
    }

    public function update(StudentRequest $request , $id)
    {
        $student  = Student::findOrFail($id);
        if(!$student)
            return redirect()->route('admin.showStudent');
        $studentUpdated = $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'spec' => $request->input('spec'),
        ]);
        if(!$studentUpdated)
            return back();
        return redirect()->route('admin.showStudent');
    }

    public function delete($id)
    {
        $student  = Student::findOrFail($id);
        if(!$student)
            return redirect()->route('admin.showStudent');
        $studentDeleted = $student->delete();
        if(!$studentDeleted)
            return back();
        return redirect()->route('admin.showStudent');
    }

    public function showCourses($student_id)
    {
        $data['courses'] =  Student::findOrFail($student_id)->courses;
        $data['student_id'] = $student_id;
        return view('admin.students.show_course',$data);
    }

    public function approveCourse($student_id,$course_id)
    {
        DB::table('course_student')
            ->where([ 'course_id' =>  $course_id,'student_id' => $student_id])
            ->update(['status' => 'Approve']);
        return back();
    }

    public function rejectCourse($student_id,$course_id)
    {
        DB::table('course_student')
            ->where([ 'course_id' =>  $course_id,'student_id' => $student_id])
            ->update(['status' => 'Reject']);
        return back();
    }

    public function addNewCourseForStudent($student_id)
    {
        $data['student_id'] = $student_id;
        $data['courses'] = Course::select()->get();
        return view('admin.students.addCourse',$data);
    }

    public function storeNewCourseForStudent($student_id, Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);


        $addedCourse =  DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if (!$addedCourse)
            return back();
        return redirect()->route('admin.students.showCourses',$student_id);
    }
}
