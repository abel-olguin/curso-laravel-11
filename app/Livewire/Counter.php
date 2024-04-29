<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;

    public function increase()
    {
        $this->counter++;

    }

    public function decrease()
    {
        $this->counter--;
    }
}
