<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Readline\Hoa\Console;

use App\Http\Controllers\TeacherController;

use App\Models\Grade;
use App\Models\GradeSubject;
use App\Models\GradeSubjectTeacher;
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

        $query = DB::table('teachers')
                                ->join('grade_subject_teacher', 'teachers.id', '=', 'grade_subject_teacher.teacher_id')
                                ->join('grade_subject', 'grade_subject_teacher.grade_subject_id', '=', 'grade_subject.id')
                                ->join('grades', 'grade_subject.grade_id', '=', 'grades.id')
                                ->join('subjects', 'grade_subject.subject_id', '=', 'subjects.id')
                                ->join('lesson_type_teacher', 'teachers.id', '=', 'lesson_type_teacher.teacher_id')
                                ->join('lesson_types', 'lesson_type_teacher.lesson_type_id', '=', 'lesson_types.id')
                                ->join('users', 'teachers.user_id', '=', 'users.id')
                                ->select('teachers.*', 'grades.grade', 'subjects.subject', 'lesson_types.lesson_type', 'users.email', 'users.name')
                                ->groupBy('teachers.id', 'subjects.subject')
                                ->get();
        

        /*$query = DB::table('teachers')
                            ->select('teachers.*', 'grades.grade', 'subjects.subject', 'users.email', 'users.name')
                            ->join(DB::table('grade_subject_teacher')
                            ->join('grade_subject', 'grade_subject_teacher.grade_subject_id', '=', 'grade_subject.id')
                            ->join('grades', 'grade_subject.grade_id', '=', 'grades.id')
                            ->join('subjects', 'grade_subject.subject_id', '=', 'subjects.id')
                            ->join('users', 'teachers.user_id', '=', 'users.id')
                            ->groupBy('subjects.subject'), function($join) {
                                $join->on('teachers.id', '=', 'grade_subject_teacher.teacher_id');
                            })
                            ->groupBy('teachers.id')
                            ->get();*/

        /*$query = DB::raw(
            "SELECT * FROM Teachers
            INNER JOIN grade_subject_teacher"
        )->get;*/
        $teachers = $query->groupBy('id');
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
}
