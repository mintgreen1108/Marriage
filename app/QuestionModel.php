<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'question';
    protected $guarded = [];

    public function reply()
    {
        return $this->hasMany(ReplyModel::class, 'question_id', 'id');
    }
}
