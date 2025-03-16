<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Settings;
use Vite;

class Sidebar extends Component
{
    public $sidebarColor;
    public $logoPath;

    protected $listeners = [
        'sidebarColorUpdated' => 'updateSidebarColor',
        'logoUpdated' => 'updateLogo'
    ];

    public function mount()
    {
        $this->sidebarColor = Settings::where('key', 'sidebar_color')->value('value') ?? 'dark';
        $this->logoPath = Settings::where('key', 'logo')->value('value') ?? Vite::asset('resources/images/hris-logo-white.png');
    }

    public function updateSidebarColor($color)
    {
        $this->sidebarColor = $color;
    }

    public function updateLogo($logoPath)
    {
        if(empty($logoPath)){
            $this->logoPath = Vite::asset('resources/images/hris-logo-white.png');
        }

        $this->logoPath = $logoPath;
    }

    public function render()
    {
        return view('livewire.admin.sidebar');
    }
}
