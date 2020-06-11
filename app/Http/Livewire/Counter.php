<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Answer;
use App\Like;

class Counter extends Component
{
    public $answer;
    public $answerId;
    public $userId;
    public $like;
    

    public function mount($answer)
    {
          
      $this->answer = $answer;
      $this->answerId = $answer->id;
      $this->userId = auth()->user()->id;
              
    }


    public function liked()
    
    {
        $this->like = 1;
        $answer = $this->answer;
        $like = $answer->likes->where('user_id' , $this->userId)->first();
        
        if($like){
            
            $like-> update(['user_id' => $this->userId , 
            'answer_id' => $this->answerId , 'like' => 1 ]);

        } else{

        Like::insert(['user_id' => $this->userId , 
        'answer_id' => $this->answerId , 'like' => 1 ]);
        
        }      
    }
    
    public function disliked()
    {

        $this->like = 0;
        $answer = $this->answer;

        $like = $answer->likes->where('user_id' , $this->userId)->first();

        if($like){
            
            $like-> delete();
        } 
    }


    public function render()
    {
        
        $likes = Like::where('answer_id' , $this->answerId)->sum('like');
        return view('livewire.counter' , ['likes' => $likes]);
              
    }

}
