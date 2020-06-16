
<div >

@if(auth()->user()->id == $answer->user_id)
<i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
@else
<i class="fa fa-caret-square-o-up" style="cursor: pointer;color: blue;" 
aria-hidden="true" wire:click="liked"></i>
@endif    
<h5 style="margin-bottom:0px;"> {{$likes}} </h5>
@if(auth()->user()->id == $answer->user_id)    
<i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
@else
<i class="fa fa-caret-square-o-down" style="cursor: pointer;color: blue;" 
aria-hidden="true" wire:click="disliked"></i>
@endif

</div>

