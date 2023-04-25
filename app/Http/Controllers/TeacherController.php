<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Qualification;
use App\Models\LessonType;
use App\Models\Subject;
use App\Models\County;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function getTeacherData() {
        $qualifications = Qualification::all();
        $lesson_types = LessonType::all();
        $subjects = Subject::all();
        $counties = County::all();

        return ['qualifications' => $qualifications, 'lesson_types' => $lesson_types, 'subjects' => $subjects, 'counties' => $counties];
    }
}
