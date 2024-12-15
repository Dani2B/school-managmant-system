<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;




class DashboardController extends Controller
{

    public function index(){

        $courses = auth()->user()->courses()->get();
      

        return view('student.dashboard', ['courses' => $courses]);
    }
   
   
}
