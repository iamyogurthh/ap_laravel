<?php

use Livewire\Component;

new class extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
};
?>

<div>
    <h3>{{ $count }}</h3>
    <button wire:click="increment">+</button>
</div>