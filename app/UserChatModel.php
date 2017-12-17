<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChatModel extends Model
{
    protected $table = 'user_chat';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function send_to()
    {
        return $this->belongsTo(UserModel::class, 'send_to', 'id');
    }
}
