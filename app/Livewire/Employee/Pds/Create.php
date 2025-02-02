<?php

namespace App\Livewire\Employee\Pds;

use Livewire\Component;

class Create extends Component
{
    public $currentStep = 10;

    public $children = [];
    public $eligibilities = [];

    protected $steps = [
        1 => 'Personal Information',
        2 => 'Family Background',
        3 => 'Educational Background',
        4 => 'Civil Service Eligibility',
        5 => 'Work Experience',
        6 => 'Voluntary Work',
        7 => 'Learning and Development',
        8 => 'Other Information',
        9 => 'Additional Questions',
        10 => 'Attachments',
    ];

    protected $stepsIcons = [
        1 => 'bi-person',
        2 => 'bi-people',
        3 => 'bi-book',
        4 => 'bi-award',
        5 => 'bi-briefcase',
        6 => 'bi-heart',
        7 => 'bi-mortarboard',
        8 => 'bi-info-circle',
        9 => 'bi-question-circle',
        10 => 'bi-paperclip'
    ];

    public function mount()
    {
        $this->children = [
            [
                'name' => '',
                'birthdate' => ''
            ]
        ];

        $this->eligibilities = [
            [
                'career_service' => '',
                'ratings' => '',
                'exam_date' => '',
                'exam_place' => '',
                'license_number' => '',
                'license_validity' => '',
            ],
        ];
    }

    public function addChild()
    {
        $this->children[] = ['name' => '', 'birthdate' => ''];
    }

    public function removeChild($index)
    {
        if(count($this->children) > 1){
            unset($this->children[$index]);
            $this->children = array_values($this->children);
        }
    }

    public function addEligibility(){
        $this->eligibilities[] = [
            [
                'career_service' => '',
                'ratings' => '',
                'exam_date' => '',
                'exam_place' => '',
                'license_number' => '',
                'license_validity' => '',
            ]
        ];
    }

    public function removeEligibility($index)
    {
        if(count($this->eligibilities) > 1){
            unset($this->eligibilities[$index]);
            $this->eligibilities = array_values($this->eligibilities);
        }
    }

    public function incrementSteps()
    {
        $this->currentStep = min($this->currentStep + 1, count($this->steps));
    }

    public function decrementSteps()
    {
        $this->currentStep = max($this->currentStep - 1, 1);
    }

    public function jumpToStep($step)
    {
        $this->currentStep = $step;
    }

    public function getStepTitleProperty()
    {
        return $this->steps[$this->currentStep];
    }

    public function getDescriptionProperty()
    {
        return match ($this->currentStep) {
            1 => 'Provide your basic details, including full name, birthdate, address, and contact information.',
            2 => 'Record essential details about your family members, including spouse, parents, and children.',
            3 => 'Document your academic journey by providing details about your schools, degrees, and achievements across all education levels.',
            4 => 'Record your civil service examinations and eligibility details, including ratings, examination dates, and relevant certifications.',
            5 => 'Detail your professional work history, including roles, responsibilities, and employment dates.',
            6 => 'List your voluntary service experiences, including the nature of work and the organizations you contributed to',
            7 => 'Document training programs and development interventions you\'ve attended, including titles, dates, and sponsors.',
            8 => 'Highlight your special skills, hobbies, non-academic achievements, and memberships in organizations.',
            9 => 'Provide responses to important questions, including legal disclosures and family-related information.',
            10 => 'I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.          I  agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.',
            default => ''
        };
    }

    public function render()
    {
        return view('livewire.employee.pds.create', [
            'steps' => $this->steps,
            'stepsIcon' => $this->stepsIcons,
        ])
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
