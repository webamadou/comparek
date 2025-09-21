<?php

namespace App\Livewire;

use App\Models\ProgramDomain;
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
    public $domain = '';
    public $domains = [];

    public function mount()
    {
        $this->schools = School::where('is_active', true)->orderBy('name')->get();
        $this->schoolsAList = $this->schools;
        $this->schoolsBList = $this->schools;
        $this->domains = ProgramDomain::orderBy('name')->pluck('name', 'id');
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
        $schoolAData = $this->schoolA ? School::with('programs.accreditationBodies', 'programs.domains')->find($this->schoolA) : null;
        $schoolBData = $this->schoolB ? School::with('programs.accreditationBodies', 'programs.domains')->find($this->schoolB) : null;

        $schoolAPrograms = ! empty($this->domain)
            ? $schoolAData->programs()->whereHas('domains', fn($q) => $q->where('program_domains.id', $this->domain))->orderBy('name')->get()
            : $schoolAData?->programs ;
        $schoolBPrograms = ! empty($this->domain)
            ? $schoolBData->programs()->whereHas('domains', fn($q) => $q->where('program_domains.id', $this->domain))->orderBy('name')->get()
            : $schoolBData?->programs ;

        return view('livewire.school-comparison', [
                'schoolAData' => $schoolAData,
                'schoolBData' => $schoolBData,
                'schoolAPrograms' => $schoolAPrograms,
                'schoolBPrograms' => $schoolBPrograms,
            ]
        );
    }
}
