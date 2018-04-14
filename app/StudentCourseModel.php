<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourseModel extends Model
{
    protected $table = 'student_course';
    protected $guarded = '';
    protected $appends = ['student', 'course', 'teacher'];

    public function getStudentAttribute()
    {
        return StudentModel::where('id', $this->student_id)->first();
    }

    public function getCourseAttribute()
    {
        return CourseModel::where('id', $this->course_id)->first()->name;
    }

    public function getTeacherAttribute()
    {
        $teacherId = TeacherCourseModel::where('course_id', $this->course_id)->first()->teacher_id;
        return TeacherModel::where('id', $teacherId)->first()->name;
    }
}
