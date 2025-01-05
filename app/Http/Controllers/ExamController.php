<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Enum\ExamStatus;


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
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'status' => 'required|in:' . implode(',', array_map(fn($case) => $case->value, ExamStatus::cases())),
            'start' => 'required|date|after:now',
            'end' => 'required|date|after:start',
            'description' => 'nullable|string|max:250',
        ]);

        $course->exams()->create($request->all());

        return redirect()->route('teacher.courses.show', ['course' => $course])->with('succes', 'Exam created succesfully');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Exam $exam)
    {
        return view('teacher.courses.exams.show', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,Exam $exam)
    {
        $questions = $exam->questions()->paginate(10);

        return view('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam, 'questions' => $questions]);
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request,Course $course, Exam $exam)
    {
        //validation
        $request->validate([
            'title' => 'required|string|max:50',
            'status' => 'required|not_in:0',
            'start' => 'required|date|after:now',
            'end' => 'required|date|before:start',
            'description' => 'nullable|string|max:250',
        ]);

        $exam->update($request->all());

        return redirect()->route('teacher.courses.show', ['course' => $course])->with('succes', 'Exam edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Exam $exam)
    {
        $exam->delete();
        return redirect()->route('teacher.courses.show', ['course' => $course])
        ->with('succes', 'Exam deleted successfully');
    }
}
