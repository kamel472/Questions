<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'body', 'question_id', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    
    
}
