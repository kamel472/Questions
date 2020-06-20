<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Question  $question
     * @return mixed
     */
    public function updateOrDelete(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

    public function approveAnswer(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

    
}
