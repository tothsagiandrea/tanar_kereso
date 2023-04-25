<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Qualification;
use App\Models\LessonType;
use App\Models\Grade;
use App\Models\County;
use App\Models\Teacher;
use App\Models\GradeSubject;
use Filament\Tables\Columns\Layout\Split;

class TeacherController extends Controller
{
    public function getTeacherData() {
        $qualifications = Qualification::all();
        $lesson_types = LessonType::all();
        $grades = Grade::all();
        $counties = County::all();

        return ['qualifications' => $qualifications, 'lesson_types' => $lesson_types, 'grades' => $grades, 'counties' => $counties];
    }

    private function getSubjectGrades($data) {
        $subject_grades = [];
        for ($i = 0; $i < count($data); $i++) {
            $ids = explode('_', $data[$i]);
            $id = DB::table('grades_for_subject')->where('subject', $ids[0])->where('grade', $ids[1])->get('id');
            $subject_grades[] = $id[0];
        }
        return $subject_grades;
    }

    private function uploadProfilePicture($file) {
        return "file";
    }

    public function insertTeacherData(TeacherRequest $request) {
        $fullname = $request->fullname;
        $highest_degree = $request->highest_degree;
        $lesson_type = $request->lesson_type;
        $location = $request->location;
        $subjects = $this->getSubjectGrades($request->subjects);
        $hourly_rate = $request->hourly_rate;
        $cv_text = $request->cv_text;
        $profile_pic = $this->uploadProfilePicture($request->profile_pic);
        $profile_video = $request->profile_video;   
    }
}
