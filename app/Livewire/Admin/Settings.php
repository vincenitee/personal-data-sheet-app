<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings as ModelsSettings;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $logo;
    public $newLogo;
    public $temporaryLogo;
    public $sidebarColor = "dark";

    protected $rules = [
        'newLogo' => 'nullable|image|max:2048', // 2MB Max
        'sidebarColor' => 'required|string',
    ];

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $logo = ModelsSettings::where('key', 'logo')->first();
        $sidebarColor = ModelsSettings::where('key', 'sidebar_color')->first();

        if ($logo) {
            $this->logo = $logo->value;
        }

        if ($sidebarColor) {
            $this->sidebarColor = $sidebarColor->value;
        }
    }

    public function updated($property, $value)
    {
        // Validate the property that was updated
        $this->validateOnly($property);

        // Generate temporary URL for logo preview
        if ($property === 'newLogo' && $this->newLogo) {
            $this->temporaryLogo = $this->newLogo->temporaryUrl();
        }

        // Dispatch event to JavaScript to update preview in real-time
        $this->dispatch('updated', [
            'name' => $property,
            'value' => $value
        ]);
    }

    public function saveSettings()
    {
        $this->validate();

        if ($this->newLogo) {
            try {
                // Store the file in storage/app/public/system_logo
                $filename = time() . '.' . $this->newLogo->getClientOriginalExtension();
                $path = $this->newLogo->storeAs('system_logo', $filename, 'public');

                if (!$path) {
                    throw new \Exception("Failed to store the file");
                }

                // Delete old logo if exists
                if ($this->logo) {
                    $oldPath = 'public/system_logo/' . $this->logo;
                    if (Storage::exists($oldPath)) {
                        Storage::delete($oldPath);
                    }
                }

                // Update logo in DB
                $this->logo = $filename;
                ModelsSettings::updateOrCreate(['key' => 'logo'], ['value' => $this->logo]);

                $this->dispatch('logoUpdated', $this->logo);
            } catch (\Exception $e) {
                $this->dispatch('show-toast', [
                    'type' => 'error',
                    'title' => 'Error saving logo: ' . $e->getMessage()
                ]);
                return;
            }
        }

        // Update sidebar color
        ModelsSettings::updateOrCreate(
            ['key' => 'sidebar_color'],
            ['value' => $this->sidebarColor]
        );

        $this->dispatch('sidebarColorUpdated', $this->sidebarColor);

        // Reset variables
        $this->newLogo = null;
        $this->temporaryLogo = null;

        $this->dispatch('show-toast', [
            'type' => 'success',
            'title' => 'Settings saved successfully!'
        ]);
    }

    public function resetToDefaults()
    {
        // Reset sidebar color to default
        $this->sidebarColor = 'dark';

        // Remove custom logo if exists
        if ($this->logo && Storage::disk('public')->exists($this->logo)) {
            Storage::disk('public')->delete($this->logo);
        }

        // Reset logo in database
        ModelsSettings::where('key', 'logo')->delete();
        $this->logo = null;
        $this->newLogo = null;
        $this->temporaryLogo = null;

        $this->dispatch('logoUpdated', null);

        // Reset sidebar color in database
        ModelsSettings::updateOrCreate(
            ['key' => 'sidebar_color'],
            ['value' => 'dark']
        );

        $this->dispatch('sidebarColorUpdated', $this->sidebarColor);

        // Show notification
        $this->dispatch('show-toast', [
            'type' => 'info',
            'title' => 'Settings reset to defaults!'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings')
            ->extends('layouts.app')
            ->title('Settings')
            ->section('content');
    }
}
