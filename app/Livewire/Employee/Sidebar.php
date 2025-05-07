<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Storage;

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
        // Get sidebar color setting
        $this->sidebarColor = Settings::where('key', 'sidebar_color')->value('value') ?? 'dark';

        // Get logo from settings
        $logo = get_setting('logo');

        if (!empty($logo) && Str::startsWith($logo, ['http', 'https'])) {
            // External URL
            $this->logoPath = $logo;
        } elseif (!empty($logo) && Storage::disk('public')->exists('system_logo/' . $logo)) {
            // Logo in storage/app/public/system_logo directory
            $this->logoPath = Storage::disk('public')->url('system_logo/' . $logo);
        } else {
            // Default logo
            $this->logoPath = asset('images/hris-logo-white.png');
        }
    }

    public function updateSidebarColor($color)
    {
        $this->sidebarColor = $color;
    }

    public function updateLogo($logoPath)
    {
        if (empty($logoPath)) {
            $this->logoPath = asset('images/hris-logo-white.png');
        }

        $this->logoPath = $logoPath;
    }

    public function render()
    {
        return view('livewire.employee.sidebar');
    }
}
