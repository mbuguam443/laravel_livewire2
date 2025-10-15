<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class UserCount extends Component
{
    public $userCount;

    public function mount()
    {
        $this->getUserCount();
    }
    public function getUserCount($option='TODAY')
    {
        $this->userCount= User::query()->whereBetween('created_at',$this->getDateRange($option))->count();
    }


    public function getDateRange($option)
    {
        if($option=='TODAY')
        {
           return [now()->today(),now()];
        }
        if($option=='MTD')
        {
           return [now()->firstOfMonth(),now()];
        }
        if($option=='YTD')
        {
           return [now()->firstOfYear(),now()];
        }

        return [now()->subDay(30),now()];
    }

    public function render()
    {
        return view('livewire.admin.dashboard.user-count');
    }
}
