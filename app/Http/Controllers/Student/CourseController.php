<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Enum\UserRole;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->orderBy('id', 'desc')->paginate(10);

        return view('student.courses.index', ['courses' => $courses]);
    }

    public function show(Course $course)
    {

        $students = $course->students()->paginate(10);

        $isEnrolled = $course->students()->where('student_id', auth()->user()->id)->first();

        return view('student.courses.show', ['course' => $course, 'students' => $students, 'isEnrolled' => $isEnrolled]);
    }

    public function enroll(Course $course, User $student)
    {


        $course->students()->attach($student->id);

        return redirect()->route('student.courses.show', ['course' => $course])->with('success', 'You have enrolled in this course');
    }
}
