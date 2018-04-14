<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
    protected $table = 'reply';
    protected $guarded = [];
    protected $appends = ['teacher'];

    public function getTeacherAttribute()
    {
        return TeacherModel::where('id', $this->teacher_id)->first()->name;
    }
}
