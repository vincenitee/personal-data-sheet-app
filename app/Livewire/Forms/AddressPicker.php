<?php

namespace App\Livewire\Forms;

use App\Models\Region;
use App\Models\Address;
use Livewire\Component;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipality;
use App\Traits\LoadsEmployeeData;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class AddressPicker extends Component
{
    use LoadsEmployeeData;

    public $regions = [];

    public $isSameAddress = false;

    public $residential = [
        'region' => null,
        'province' => null,
        'provinces' => [],
        'municipality' => null,
        'municipalities' => [],
        'barangay' => null,
        'barangays' => [],
        'subdivision' => null,
        'street' => null,
        'house' => null,
        'zip' => null,
    ];

    public $permanent = [
        'region' => null,
        'province' => null,
        'provinces' => [],
        'municipality' => null,
        'municipalities' => [],
        'barangay' => null,
        'barangays' => [],
        'subdivision' => null,
        'street' => null,
        'house' => null,
        'zip' => null,
    ];
    
    public function mount(Address $address)
    {
        $this->regions = Region::all();

        $addresses = $this->addresses();

        $permanent = $addresses->get(0, []);
        $residential = $addresses->get(1, []);

        // Assign values
        $this->loadAddresses($residential, $permanent);

        // Manually trigger updates for dependent fields
        $this->updated('residential.region', $this->residential['region']);
        $this->updated('residential.province', $this->residential['province']);
        $this->updated('residential.municipality', $this->residential['municipality']);

        $this->updated('permanent.region', $this->permanent['region']);
        $this->updated('permanent.province', $this->permanent['province']);
        $this->updated('permanent.municipality', $this->permanent['municipality']);
    }

    #[Computed]
    protected function addresses(){
        return Auth::user()?->entries()?->first()?->personalInformation?->addresses ?? collect();
    }

    public function updated($property, $value)
    {
        match ($property) {
            'residential.region' => $this->residential = array_merge($this->residential, [
                'provinces' => Province::where('region_id', $value)->get()->toArray(),
                'municipalities' => [],
                'barangays' => [],
            ]),

            'residential.province' => $this->residential = array_merge($this->residential, [
                'municipalities' => Municipality::where('province_id', $value)->get()->toArray(),
                'barangays' => [],
            ]),

            'residential.municipality' => $this->residential = array_merge($this->residential, [
                'barangays' => Barangay::where('municipality_id', $value)->get()->toArray(),
            ]),

            'permanent.region' => $this->permanent = array_merge($this->permanent, [
                'provinces' => Province::where('region_id', $value)->get()->toArray(),
                'municipalities' => [],
                'barangays' => [],
            ]),

            'permanent.province' => $this->permanent = array_merge($this->permanent, [
                'municipalities' => Municipality::where('province_id', $value)->get()->toArray(),
                'barangays' => [],
            ]),

            'permanent.municipality' => $this->permanent = array_merge($this->permanent, [
                'barangays' => Barangay::where('municipality_id', $value)->get()->toArray(),
            ]),

            'isSameAddress' => $this->syncAddresses(),

            default => '',
        };

        $this->dispatch('address-updated', [
            'residential' => $this->residential,
            'permanent' => $this->permanent,
        ]);
    }

    private function syncAddresses()
    {
        $addresses = $this->addresses();

        $storedPermanent = $addresses->get(0, []);

        if ($this->isSameAddress) {
            $this->permanent = $this->residential;
            return;
        }

        if(!empty($storedPermanent)){
            $this->loadPermanentAddress($storedPermanent);
            $this->updated('permanent.region', $this->permanent['region']);
            $this->updated('permanent.province', $this->permanent['province']);
            $this->updated('permanent.municipality', $this->permanent['municipality']);
            return;
        }

        $this->permanent = [
            'region' => null,
            'province' => null,
            'provinces' => [],
            'municipality' => null,
            'municipalities' => [],
            'barangay' => null,
            'barangays' => [],
            'subdivision' => null,
            'street' => null,
            'house' => null,
            'zip' => null,
        ];

    }

    public function render()
    {
        return view('livewire.forms.address-picker');
    }
}
