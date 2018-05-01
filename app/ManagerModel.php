<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagerModel extends Model
{
    protected $table = 'manager';
    protected $guarded = [];

    public static function login($name, $password)
    {
        session_start();
        $user = self::where('name', $name)->firstOrFail();
        if (md5($password) != $user->password) throw new \Exception('error');
        $_SESSION['manager_name'] = $user->name;
        $_SESSION['manager_id']   = $user->id;
    }
}
