<?php

namespace App\Livewire\Admin\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class TotalEmployee extends Component
{
    public $percentageIncrease = 0;

    public $employeeCountCurrent = 0;

    public function mount(){
        $lastMonthCount = User::role('employee')
            ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth(),
            ])
            ->count();

        $this->employeeCountCurrent = User::role('employee')
            ->count();

        $this->percentageIncrease = $lastMonthCount > 0 ?
            round((($this->employeeCountCurrent - $lastMonthCount) / $lastMonthCount) * 100, 2) :
            0;
    }

    public function placeholder(){
        return view('placeholders.dashboard-card', ['showProgressBar' => false]);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.total-employee');
    }
}
