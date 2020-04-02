<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
class StudentsController extends Controller
{
    public function student()
    {
    	return view('student.add_student');
    }

    public function storeStudent(Request $request)
    {
    	$validatedData = $request->validate([
            'student_name' => 'required|unique:students|max:25|min:4',
            'student_email' => 'required|unique:students|max:25|min:4',
            'phone' => 'required|unique:students|max:25|min:4',
        ]);

       $student = new Student;
       $student->student_name = $request->student_name;
       $student->student_email = $request->student_email;
       $student->phone = $request->phone;
       $student->save();
       if($student->save())
       {
       	 return Redirect()->route('add.student')->with('success','Information are inserted successfully');
       }
       else
       {
         return back()->with('error', 'Posts are not inserted successfully');
       }
    }
}
