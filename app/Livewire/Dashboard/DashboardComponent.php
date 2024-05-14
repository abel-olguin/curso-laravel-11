<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.dashboard')]
#[Title('Dashboard')]
class DashboardComponent extends Component
{


    public function render()
    {
        return view('livewire.dashboard.dashboard-component');
    }
}
