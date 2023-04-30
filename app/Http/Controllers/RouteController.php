<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\TeacherController;

use App\Models\Grade;
use App\Models\GradeSubject;
use App\Models\GradeSubjectTeacher;
use App\Models\LessonType;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Town;
use Illuminate\Support\Facades\Redirect;

/**
 * Summary of RouteController
 */
class RouteController extends Controller
{
    public function showIndex () : View {
        $subjects = Subject::all();
        $grades = Grade::all();
        $towns = Town::orderBy('town')->get();
        $lesson_types = LessonType::all();
        $teachers = Teacher::with(['grade_subjects.grade', 'grade_subjects.subject', 'user', 'towns.county', 'lesson_types'])->get();
        return view('index', compact('teachers', 'subjects', 'grades', 'towns', 'lesson_types'));
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
        if ($user->user_group->name != 'tanár') {
            if ($_SERVER['HTTP_REFERER']) {
                Redirect::back();
            } else {
                Redirect::to('/');
                return view('/');
            }
        }
        $data = (new TeacherController)->getTeacherData();
        $qualifications = $data['qualifications'];
        $lesson_types = $data['lesson_types'];
        $grades = $data['grades'];
        $counties = $data['counties'];

        Redirect::to('/teacherdata');
        return view('teacherdata', compact('user', 'qualifications', 'lesson_types', 'grades', 'counties'));
    }

    public function setTeacherData(Request $request) {
        dd($request);
    }

    public function showTeacherPage (Request $request) : View {
        $user = auth()->user();
        $teacher = Teacher::with(['grade_subjects.grade', 'grade_subjects.subject', 'user', 'towns.county'])->find($request->id);
        return view('teacher', compact('teacher', 'user'));
    }

    public function showAszf () : View {
        return view('aszf');
    }

    public function showGdpr () : View {
        return view('gdpr');
    }

    public function sendEmail (ContactRequest $request) : View{
        $email = $request->email;
        $name = $request->name;
        $message = $request->message;
        Mail::to(env('MAIL_FROM_ADDRESS', 'info.tanarkereso@gmail.com'))->send(new ContactEmail($email, $name, $message));
        return view('emailsent');
    }
}
