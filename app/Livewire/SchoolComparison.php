<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Component;
use mysql_xdevapi\Collection;

class SchoolComparison extends Component
{
    public ?string $schoolA = null;
    public ?string $schoolB = null;
    public $schools = null;
    public $schoolsAList = null;
    public $schoolsBList = null;

    public function mount()
    {
        $this->schools = School::where('is_active', true)->orderBy('name')->get();
        $this->schoolsAList = $this->schools;
        $this->schoolsBList = $this->schools;
    }

    public function updated()
    {
        if (! empty($this->schoolA)) {
            $this->schoolsBList = $this->schools->filter(fn ($school) => $school->id != $this->schoolA)->values();
        }

        if (! empty($this->schoolB)) {
            $this->schoolsAList = $this->schools->filter(fn ($school) => $school->id != $this->schoolB)->values();
        }
    }

    public function render()
    {
        return view('livewire.school-comparison', [
                'schoolsAList' => $this->schoolsAList,
                'schoolsBList' => $this->schoolsBList,
                'schoolAData' => $this->schoolA ? School::with('programs.accreditationBodies', 'programs.domain')->find($this->schoolA) : null,
                'schoolBData' => $this->schoolB ? School::with('programs.accreditationBodies', 'programs.domain')->find($this->schoolB) : null,
            ]
        );
    }
}
