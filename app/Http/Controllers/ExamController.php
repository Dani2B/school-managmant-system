<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Course;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('teacher.courses.exams.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course )
    {
        dd($request->all());
        //$course->exams()->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course $course,Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
