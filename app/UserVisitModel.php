<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVisitModel extends Model
{
    protected $table = 'user_visit';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function visitedUser()
    {
        return $this->belongsTo(UserModel::class, 'visited_user_id', 'id');
    }
}
