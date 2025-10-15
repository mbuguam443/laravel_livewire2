<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Analytics extends Component
{

    public $days=[];
    public $subscribers=[30, 40, 35, 50, 49, 60, 70, 91, 125];

    public function mount()
    {
        $this->days=collect(range(13,24))->map(function($number){
                return 'Jun '.$number;
        });
    }

    public function render()
    {
        return view('livewire.admin.dashboard.analytics');
    }
}
