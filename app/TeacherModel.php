<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = 'teacher';
    protected $guarded = [];

    public static function login($name, $password)
    {
        session_start();
        $user = TeacherModel::where('name', $name)->firstOrFail();
        if (md5($password) != $user->password) throw new \Exception('error');
        $_SESSION['teacher_name'] = $user->name;
        $_SESSION['teacher_id']   = $user->id;
        return true;
    }
}
