<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Readline\Hoa\Console;

/**
 * Summary of RouteController
 */
class RouteController extends Controller
{
    public function showIndex () : View {
        $teachers = Teacher::get();
        return view('index', compact('teachers'));
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
        return view('teacherdata');
    }

    public function setTeacherData(Request $request) {
        dd($request);
    }

    public function showTeacherPage (Request $request) : View {
        $teachers = Teacher::get();
        $teacher = $teachers->find($request->id);
        return view('teacher', compact('teacher'));
    }
}
