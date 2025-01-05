<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Exam;

class QuestionController extends Controller
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
    public function create(Course $course, Exam $exam)
    {
        return view('teacher.courses.exams.questions.create', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Store a newly created resource in storage.x
     */
    public function store(Request $request, Course $course, Exam $exam)
    {
        $request->validate([
            'text' => 'required|string|max:50',
            'image' => 'nullable',
            'description' => 'nullable|string|max:250',
            'options.*.text' => 'required|string|max:255',
            'options.*.is_answer' => 'required|in:True,False',
        ]);

        $exam->questions()->create($request->all());

        return redirect()->route('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam])->with('succes', 'Question created succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Exam $exam, Question $question)
    {
        return view('teacher.courses.exams.questions.show', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Exam $exam, Question $question)
    {
        $questions = $exam->questions()->paginate(10);

        return view('teacher.courses.exams.questions.edit', ['course' => $course, 'exam' => $exam, 'questions' => $questions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Exam $exam, Question $question)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'status' => 'required|in:' . implode(',', array_map(fn($case) => $case->value, ExamStatus::cases())),
            'start' => 'required|date|after:now',
            'end' => 'required|date|after:start',
            'description' => 'nullable|string|max:250',
        ]);
        

        $question->update($request->all());

        return redirect()->route('teacher.courses.exams.show', ['course' => $course])->with('succes', 'Exam edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Exam $exam, Question $question)
    {
        $question->delete();
        return redirect()->route('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam])
        ->with('succes', 'Exam deleted successfully');
    }
}
