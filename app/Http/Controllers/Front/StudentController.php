<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function storeStudent(StudentRequest $request)
    {
        $student_id = '';
        $oldStudent = Student::select('id')->where('email',$request['email'])->first();
        if($oldStudent == null)
        {
            $student_id = Student::insertGetId([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'spec' => $request->input('spec'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        else{
            $student_id = $oldStudent->id;
            if($request['name'] !== null){
                $oldStudent->update(['name' => $request->input('name')]);
            }

            if($request['spec'] !== null){
                $oldStudent->update(['spec' => $request->input('spec')]);
            }
        }


        DB::table('course_student')->insert([
            'course_id' => $request->input('course_id'),
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back();
    }
}
