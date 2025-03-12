<?php

namespace App\Livewire\Print\Sections;

use Livewire\Component;
use App\Models\AdditionalQuestion;
use App\Models\PdsAttachment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class C4 extends Component
{
    public ?AdditionalQuestion $questions;
    public ?Collection $referencePersons;
    public ?PdsAttachment $attachment;
    public $dateAccomplished;

    public function mount(
        ?AdditionalQuestion $questions,
        ?PdsAttachment $attachment,
    ) {
        $this->questions = $questions;
        $this->referencePersons = $this->questions?->referencePersons ?? collect();
        $this->attachment = $attachment;

        $this->dateAccomplished = Carbon::parse($this->attachment->entry->updated_at)->format('m/d/Y');
        // dd($this->attachment);
        // dd($referencePersons);
    }
    public function render()
    {
        return view('livewire.print.sections.c4');
    }
}
