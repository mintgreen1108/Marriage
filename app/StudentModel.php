<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $guarded = [];

    protected $appends = ['class'];

    public function getClassAttribute()
    {
        return ClassModel::where('id', $this->class_id)->first()->name;
    }

    public static function login($name, $password)
    {
        session_start();
        $user = StudentModel::where('name', $name)->firstOrFail();
        if (md5($password) != $user->password) throw new \Exception('error');
        $_SESSION['student_name'] = $user->name;
        $_SESSION['student_id']   = $user->id;
        return true;
    }
}
