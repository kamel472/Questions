<div>

    @if($approved == 1)
    <i class="fa fa-check" aria-hidden="true" style="color: green;" ></i>
    @else
    <i class="fa fa-check" aria-hidden="true" style="cursor: pointer; color: rgb(184, 170, 170)" 
    wire:click="approve"></i>
    @endif

    
</div>
