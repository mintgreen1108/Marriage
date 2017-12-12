<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationModel extends Model
{
    protected $table = 'user_evaluation';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function evaluated()
    {
        return $this->belongsTo(UserModel::class, 'evaluate_to', 'id');
    }
}
