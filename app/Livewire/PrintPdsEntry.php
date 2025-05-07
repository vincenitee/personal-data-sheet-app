<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PdsEntry;
use Spatie\Browsershot\Browsershot;

class PrintPdsEntry extends Component
{
    public PdsEntry $pdsEntry;
    public $pdfPath;

    public function mount(PdsEntry $pdsEntry)
    {
        $this->pdsEntry = $pdsEntry;
    }

    public function render()
    {
        return view('livewire.print-pds-entry', [
            'pdsEntry' => $this->pdsEntry
        ])
        ->extends('layouts.auth');
    }
}
