<?php

namespace App\Livewire\Forms;

use App\Enums\Citizenship;
use App\Enums\CitizenshipMethod;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NationalityPicker extends Component
{
    public $personal_information = null;

    public $citizenships = [];
    public $citizenshipMethods = [];

    public $citizenship = null;
    public $method = null;
    public $country = null;

    public $is_country_disabled = true;

    public function mount()
    {
        // Load enum options
        $this->citizenships = Citizenship::options();
        $this->citizenshipMethods = CitizenshipMethod::options();

        // Check if the user is authenticated before accessing personal information
        if (Auth::check()) {
            $entries = Auth::user()->entries()->first();
            $this->personal_information = $entries?->personalInformation;
        }

        // Pre-fill values if personal information exists
        if ($this->personal_information) {
            $this->citizenship = $this->personal_information->citizenship;
            $this->method = $this->personal_information->citizenship_by;
            $this->country = $this->personal_information->country ?? null;
        }

        // Ensure the correct state of is_country_disabled
        $this->updateCountryState();
    }

    public function updated($property, $value)
    {
        $this->updateCountryState();

        // Dispatch event with updated values
        $this->dispatch('nationality-updated', [
            'citizenship' => $this->citizenship,
            'citizenship_by' => $this->method,
            'country' => $this->country
        ]);
    }

    private function updateCountryState()
    {
        // Enable country selection if citizenship is 'dual' or method is 'naturalization'
        $this->is_country_disabled = !($this->citizenship === 'dual' || $this->method === 'naturalization');

        // If country input is disabled, reset country
        if ($this->is_country_disabled) {
            $this->country = null;
        }
    }

    public function render()
    {
        return view('livewire.forms.nationality-picker');
    }
}
