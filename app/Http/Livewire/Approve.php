<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Answer;


class Approve extends Component
{
    public $count;
    public $answerId;
    

    public function mount($answer)
    {
        
      $this->approved = $answer->approved;
      $this->answerId = $answer->id;
      
        
    }


    public function approve()
    {
        Answer::where('id' , $this->answerId)->update(['approved' => 1]);
           
    }
    
    public function render()
    {

        $answers = Answer::where('id' , $this->answerId)->get();
        foreach ($answers as $answer) {
            $approved = $answer->approved;
        }

        return view('livewire.approve' ,  ['approved' => $approved]);
    }
}
