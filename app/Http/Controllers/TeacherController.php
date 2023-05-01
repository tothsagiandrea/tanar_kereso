<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Qualification;
use App\Models\LessonType;
use App\Models\Grade;
use App\Models\County;
use App\Models\GradeSubject;
use App\Models\GradeSubjectTeacher;
use App\Models\Teacher;
use App\Models\LessonTypeTeacher;
use App\Models\TeacherTown;

class TeacherController extends Controller
{

    public function getTeacherData() {
        $qualifications = Qualification::all();
        $lesson_types = LessonType::all();
        $grades = Grade::all();
        $counties = County::all();

        $user = auth()->user();
        $teacher = $user->teacher;

        if ($teacher != null) {
            $query = Teacher::with(['grade_subjects.grade', 'grade_subjects.subject', 'user', 'towns.county', 'lesson_types'])->find($teacher->id);
        } else {
            $query = null;
        }

        return ['teacher' => $query, 'qualifications' => $qualifications, 'lesson_types' => $lesson_types, 'grades' => $grades, 'counties' => $counties];
    }

    public function showFilteredTeacherPage(Request $request) {
        $query = Teacher::query()->with(['grade_subjects', 'user', 'towns', 'lesson_types']);
        if ($request->has('subject')) {
            $query->whereRelationIn('grade_subjects', 'subject_id', $request->subject);
        }

        if ($request->has('grade')) {
            $query->whereRelationIn('grade_subjects', 'grade_id', $request->grade);
        }

        if ($request->has('town')) {
            $query->whereRelationIn('towns', 'town_id', $request->town);
        }

        if ($request->has('lesson_type')) {
            $query->whereRelationIn('lesson_types', 'lesson_type_id', $request->lesson_type);
        }

        $teachers = $query->select('id')->get();
        return response()->json([
            'teachers' => $teachers
        ]);
    }

    private function getSubjectGrades($data) {
        $subject_grades = [];
        foreach ($data as $grade_subject_id){
            $ids = explode('_', $grade_subject_id);
            $row = GradeSubject::where('subject_id', $ids[0])->where('grade_id', $ids[1])->get('id');
            $subject_grades[] = $row[0]->id;
        }
        return $subject_grades;
    }

    private function uploadProfilePicture($file) {
        if (!Storage::directoryExists('public/profile_pics')) {
            Storage::makeDirectory('public/profile_pics');
        }

        $user = auth()->user();
        $teacher = $user->teacher;
        $file_name = $user->id.'.'.$file->extension();

        if ($teacher != null) {
            $current_file = $user->teacher->profile_pic_path;
            Storage::delete('public/profile_pics/'.$current_file);
            Storage::putFileAs('public/profile_pics', $file, $file_name);
        } else {
            Storage::putFileAs('public/profile_pics', $file, $file_name);
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
        $teacher->qualification_id = $highest_degree;
        $teacher->user_id = auth()->id();

        $teacher->save();
        $teacher_id = $teacher->id;

        for ($i = 0; $i < count($lesson_type); $i++) {
            $t_lesson_type = new LessonTypeTeacher();
            $t_lesson_type->teacher_id = $teacher_id;
            $t_lesson_type->lesson_type_id = $lesson_type[$i];

            $t_lesson_type->save();
        }

        if ($location != null) {
            for ($i = 0; $i < count($location); $i++) {
                $t_location = new TeacherTown();
                $t_location->teacher_id = $teacher_id;
                $t_location->town_id = $location[$i];

                $t_location->save();
            }
        }

        for ($i = 0; $i < count($subjects); $i++) {
            $t_subject = new GradeSubjectTeacher();
            $t_subject->teacher_id = $teacher_id;
            $t_subject->grade_subject_id = $subjects[$i];

            $t_subject->save();
        }

        return redirect()->route('teacherPage', $teacher_id);
    }

    public function updateTeacherData(Request $request) {
        $teacher_id = $request->teacher;
        $highest_degree = $request->highest_degree;
        $lesson_type = $request->lesson_type;
        $location = $request->location;
        $subjects = $this->getSubjectGrades($request->subjects);
        $hourly_rate = $request->hourly_rate;
        $cv_text = $request->cv_text;
        if ($request->profile_pic != null) {
            $profile_pic = $this->uploadProfilePicture($request->profile_pic);
        }
        $profile_video = $request->profile_video;

        $teacher = Teacher::find($teacher_id);

        $teacher->curriculum_vitae = $cv_text;
        $teacher->hourly_rate = $hourly_rate;
        if ($request->profile_pic != null) {
            $teacher->profile_pic_path = $profile_pic;
        }
        $teacher->profile_video_path = $profile_video;
        $teacher->qualification_id = $highest_degree;

        $teacher->save();

        for ($i = 0; $i < count($lesson_type); $i++) {
            $t_lesson_type = LessonTypeTeacher::find($teacher_id);
            $t_lesson_type->lesson_type_id = $lesson_type[$i];

            $t_lesson_type->save();
        }

        if ($location != null) {
            for ($i = 0; $i < count($location); $i++) {
                $t_location = TeacherTown::find($teacher_id);
                $t_location->town_id = $location[$i];

                $t_location->save();
            }
        }

        for ($i = 0; $i < count($subjects); $i++) {
            $t_subject = GradeSubjectTeacher::find($teacher_id);
            $t_subject->grade_subject_id = $subjects[$i];

            $t_subject->save();
        }

        return redirect()->route('teacherPage', $teacher_id);
    }
}
