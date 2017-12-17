<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLikeModel extends Model
{
    protected $table = 'user_like';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
