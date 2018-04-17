<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherCourseModel extends Model
{
    protected $table = 'teacher_course';
    protected $guarded = [];

    protected $appends = ['teacher', 'course'];

    public function getTeacherAttribute()
    {
        return TeacherModel::where('id', $this->teacher_id)->first()->name;
    }

    public function getCourseAttribute()
    {
        return CourseModel::where('id', $this->course_id)->first()->name;
    }

    public function students()
    {
        return $this->hasMany(StudentCourseModel::class, 'course_id', 'course_id');
    }

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
