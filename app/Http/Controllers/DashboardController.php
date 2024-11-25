<?php

namespace App\Http\Controllers;

use App\Enum\UserRole;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::where('role', UserRole::STUDENT)->count();
        $teacherCount = User::where('role', UserRole::TEACHER)->count();
        $courseCount = Course::count();

      

        $data['Students'] = $studentCount;
        $data['Teachers'] = $teacherCount;
        $data['Courses'] = $courseCount;

    

        return view('admin.dashboard', ['data' => $data]);
    }
}
