<?php

namespace App\Policies;

use App\User;
use App\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function updateOrDelete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    public function rate (User $user, Answer $answer)
    {
        return $answer->ratings()->where ('user_id' , $user->id)->count() == 0
        && $user->id !== $answer->user_id ;
        
    }



}
