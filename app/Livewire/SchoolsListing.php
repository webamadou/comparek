<?php

namespace App\Livewire;

use App\Models\AccreditationBody;
use App\Models\School;
use Livewire\Component;

class SchoolsListing extends Component
{
    public $city = '';
    public $accept_foreign = '';
    public $is_private = 0;
    public $picked_accreds = [];
    public $accreditations = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->accreditations = AccreditationBody::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function render()
    {
        $schools = School::query()->get();
        return view('livewire.schools-listing',  compact('schools'));
    }
}
