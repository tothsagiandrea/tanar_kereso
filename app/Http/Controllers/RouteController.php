<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Readline\Hoa\Console;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Town;

/**
 * Summary of RouteController
 */
class RouteController extends Controller
{
    public function showIndex () : View {
        $teachers = Teacher::get();
        $subjects = Subject::get();
        $grades = Grade::get();
        $towns = DB::table('towns')->orderBy('town')->get();
        return view('index', compact('teachers', 'subjects', 'grades', 'towns'));
    }

    public function showContacts () : View {
        return view('contacts');
    }

    public function showServices () : View {
        return view('services');
    }

    public function showForum () : View {
        return view('forum');
    }

    public function showTeacherDataPage () : View {
        $user = auth()->user();
        return view('teacherdata', compact('user'));
    }

    public function setTeacherData(Request $request) {
        dd($request);
    }

    public function showTeacherPage (Request $request) : View {
        $teachers = Teacher::get();
        $teacher = $teachers->find($request->id);
        return view('teacher', compact('teacher'));
    }

    public function showAszf () : View {
        return view('aszf');
    }
}
