<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFocusModel extends Model
{
    protected $table = 'user_focus';
    protected $guarded = [];

    public function focused_user()
    {
        return $this->belongsTo(UserModel::class, 'focused_id', 'id');
    }
}
