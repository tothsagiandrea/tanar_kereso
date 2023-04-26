<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\Layout\Split;

use App\Models\Qualification;
use App\Models\LessonType;
use App\Models\Grade;
use App\Models\County;
use App\Models\Teacher;
use App\Models\TeacherQualification;
use App\Models\TeacherLessonType;
use App\Models\TeacherLocation;
use App\Models\TeachedSubject;

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
            $row = DB::table('grades_for_subject')->where('subject', $ids[0])->where('grade', $ids[1])->get('id');
            $subject_grades[] = $row[0]->id;
        }
        return $subject_grades;
    }

    private function uploadProfilePicture($file) {
        if (!Storage::directoryExists('profile_pics')) {
            Storage::makeDirectory('profile_pics');
        }

        $user = auth()->user();
        $teacher = Teacher::count('user', $user->id);
        $file_name = $user->id.'.'.$file->extension();

        if ($teacher > 0) {
            $current_file = $user->teacher->profile_pic_path;
            Storage::delete('profile_pics/'.$current_file);
            Storage::putFileAs('profile_pics', $file, $file_name);
        } else {
            Storage::putFileAs('profile_pics', $file, $file_name);
        }

        return $file_name;
    }

    public function insertTeacherData(TeacherRequest $request) {
        $highest_degree = $request->highest_degree;
        $lesson_type = $request->lesson_type;
        $location = $request->location;
        $subjects = $this->getSubjectGrades($request->subjects);
        $hourly_rate = $request->hourly_rate;
        $cv_text = $request->cv_text;
        $profile_pic = $this->uploadProfilePicture($request->profile_pic);
        $profile_video = $request->profile_video;

        $teacher = new Teacher();

        $teacher->curriculum_vitae = $cv_text;
        $teacher->hourly_rate = $hourly_rate;
        $teacher->profile_pic_path = $profile_pic;
        $teacher->profile_video_path = $profile_video;
        $teacher->user = auth()->id();

        $teacher->save();
        $teacher_id = $teacher->id;


        $t_qualification = new TeacherQualification();

        $t_qualification->teacher = $teacher_id;
        $t_qualification->qualification = $highest_degree;

        $t_qualification->save();


        for ($i = 0; $i < count($lesson_type); $i++) {
            $t_lesson_type = new TeacherLessonType();
            $t_lesson_type->teacher = $teacher_id;
            $t_lesson_type->lesson_type = $lesson_type[$i];

            $t_lesson_type->save();
        }

        for ($i = 0; $i < count($location); $i++) {
            $t_location = new TeacherLocation();
            $t_location->teacher = $teacher_id;
            $t_location->town = $location[$i];

            $t_location->save();
        }

        for ($i = 0; $i < count($subjects); $i++) {
            $t_subject = new TeachedSubject();
            $t_subject->teacher = $teacher_id;
            $t_subject->subject_grade = $subjects[$i];

            $t_subject->save();
        }
    }
}
