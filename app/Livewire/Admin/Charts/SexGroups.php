<?php

namespace App\Livewire\Admin\Charts;

use App\Models\PdsEntry;
use App\Models\User;
use Livewire\Component;

class SexGroups extends Component
{
    public $chartData;

    public function mount(){
        $employees = User::role('employee')->get();

        $maleCount = $employees->where('sex', 'male')->count();
        $femaleCount = $employees->where('sex', 'female')->count();

        $this->chartData = [
            'labels' => ['Male', 'Female'],
            'series' => [$maleCount, $femaleCount]
        ];
    }

    public function render()
    {
        return view('livewire.admin.charts.sex-groups');
    }
}
