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
}
