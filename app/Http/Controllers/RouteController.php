<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Readline\Hoa\Console;

/**
 * Summary of RouteController
 */
class RouteController extends Controller
{
    public function showIndex () : View {
        return view('index');
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

    public function showTeacherPage () : View {
        return view('teacher');
    }
}
