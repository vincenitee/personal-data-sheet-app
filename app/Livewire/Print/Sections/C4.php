<?php

namespace App\Livewire\Print\Sections;

use Livewire\Component;
use App\Models\AdditionalQuestion;
use App\Models\PdsAttachment;
use App\Models\PdsEntry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class C4 extends Component
{
    public ?AdditionalQuestion $questions;
    public ?Collection $referencePersons;
    public ?PdsAttachment $attachment;
    public $dateAccomplished;

    public function mount(
        ?PdsEntry $pdsEntry
    ) {
        $this->questions = $pdsEntry->question;
        $this->referencePersons = $this->questions?->referencePersons;
        $this->attachment = $pdsEntry->attachment;

        $this->dateAccomplished = Carbon::parse($pdsEntry->updated_at)->format('m/d/Y');
    }
    public function render()
    {
        return view('livewire.print.sections.c4');
    }
}
