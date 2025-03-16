<?php

namespace App\Livewire\Admin\Steps;

use App\Models\AdditionalQuestion;
use App\Traits\LoadsEmployeeData;
use Livewire\Component;

class Questionnaire extends Component
{
    use LoadsEmployeeData;

    public int $submissionId;
    public AdditionalQuestion $questionResponses;

    public bool $has_third_degree_relative = false;
    public bool $has_fourth_degree_relative = false;
    public $fourth_degree_relative = null;

    public bool $has_admin_case = false;
    public $admin_case_details = null;

    public bool $has_criminal_charge = false;
    public $criminal_charge_date = null;
    public $criminal_charge_status = null;

    public bool $has_criminal_conviction = false;
    public $criminal_conviction_details = null;

    public bool $has_separation_from_service = false;
    public $separation_details = null;

    public bool $is_election_candidate = false;
    public $election_details = null;

    public bool $has_resigned_for_election = false;
    public $resignation_details = null;

    public bool $is_immigrant = false;
    public $immigrant_country = null;

    public bool $is_indigenous = false;
    public $indigenous_details = null;

    public bool $is_disabled = false;
    public $disabled_person_id = null;

    public bool $is_solo_parent = false;
    public $solo_parent_id = null;

    public $openCard;

    public $entryStatus;

    public function mount(
        int $submissionId,
        AdditionalQuestion $questionResponses,
        string $entryStatus
    ){
        $this->entryStatus = $entryStatus;
        // dd($questionResponses->referencePersons);
        $this->submissionId = $submissionId;
        $this->questionResponses = $questionResponses;

        $this->loadExistingData();
    }

    public function loadExistingData(){
        $this->loadQuestionResponses($this->questionResponses);
    }


    public function render()
    {
        return view('livewire.admin.steps.questionnaire');
    }
}
