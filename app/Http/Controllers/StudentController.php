<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student_Course;

class StudentController extends Controller
{
    function index() {
        return view('student.index');
    }

    function courses($id) {
        $courses = Course::all();
        $student_courses =  Student_Course::where('studentId', '=', $id)->get();
        if(count($student_courses) > 0) {
            session()->put('array_courses',$student_courses);
        }
        session()->put('userId',$id);
        return view('student.courses', compact('courses'));
    }
    function saveCourse(Request $request, $id) {
        $selectCourse = $request->courses;
        $courses = Student_Course::where('studentId', $id)->pluck('courseId')->toArray();
        // dd($courses);
        
        foreach ($selectCourse as $item) {
            if(!in_array($item, $courses)) {
                $student_course = new Student_Course;
                $student_course->studentId = $id;
                $student_course->courseId = $item;
                $student_course->save();
            }
        }

        foreach($courses as $item) {
            if(!in_array($item, $selectCourse)) {
                $course = Student_Course::where('studentId', $id)->delete();
                session()->pull('userId','default');
            }
        }
        return redirect('/');
    }
}
