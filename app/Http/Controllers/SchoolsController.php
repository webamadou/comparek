<?php

namespace App\Http\Controllers;

use App\Models\AccreditationBody;
use App\Models\ProgramDomain;
use App\Models\ProgramSuperDomain;
use App\Models\School;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SchoolsController extends Controller
{
    public function index()
    {
        // Caching 6 hours
        $ttl = now()->addHours(6);

        $accreditations = Cache::remember('schools:accreditations:v2', $ttl, function () {
            return AccreditationBody::whereNotIn('id', [1, 2, 3])
                ->orderBy('name')
                ->pluck('name', 'id');
        });

        $domains = Cache::remember('schools:domains:v2', $ttl, function () {
            return collect();
        });

        $superDomains = Cache::remember('schools:super-domains:v1.2', $ttl, function () {
            return ProgramSuperDomain::orderBy('slug')->with('domains')->get();
        });

        $schools = Cache::remember('schools:schools:v1', $ttl, function () {
            return School::where('is_active', 1)->orderBy('name')->get();
        });

        $programs = Cache::remember('schools:programs:v1.2.1', $ttl, function () {
            return SchoolProgram::select(['id', 'name', 'slug', 'school_id', 'level', 'duration_years', 'modality'])
                ->with(['school:id,slug,name'])
                ->without(['domains', 'accreditationBodies', 'features'])
                ->whereHas('school')
                ->orderBy('name')->orderBy('school_id')
                ->get();
        });

        return view('list_schools',  compact('accreditations',  'schools',  'domains', 'programs', 'superDomains'));
    }

    public function view(School $school)
    {
        // Caching 6 hours
        $ttl = now()->addHours(6);

        $accreditations = Cache::remember('school:accreditations_for_school_'.$school->id.':v1', $ttl, fn() =>
            AccreditationBody::whereNotIn('id', [1,2,3])->orderBy('name')->pluck('name', 'id')->toArray()
        );

        $supDomains = Cache::remember(
            'school:domains_for_school_'.$school->id.':v2',
            $ttl,
            fn() => ProgramSuperDomain::orderBy('slug')->with('domains')->get()
        );

        $programs = Cache::remember('school:programs_for_school_'.$school->id.':v1', $ttl, fn() => $school->programs)
            ->load(['domains', 'accreditationBodies', 'features']);

        return view('view_school', compact('school',  'accreditations', 'supDomains', 'programs'));
    }

    public function accredited()
    {
        // Caching 6 hours
        $ttl = now()->addHours(6);

        /*$accreditations = AccreditationBody::whereNotIn('id', [1,2,3])->orderBy('name')->pluck('name', 'id')->toArray();*/
        $accreditations = Cache::remember('accred-schools:accreditations:v2', $ttl, function () {
            return AccreditationBody::whereNotIn('id', [1, 2, 3])
                ->orderBy('name')
                ->pluck('name', 'id');
        });

        /*$domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();*/
        $domains = Cache::remember('accred-schools:domains:v1', $ttl, function () {
            return collect();
        });

        $superDomains = Cache::remember('schools:super-domains:v2', $ttl, function () {
            return ProgramSuperDomain::orderBy('slug')->with('domains')->get();
        });

        $schools = Cache::remember('accred-schools:schools:v1', $ttl, function () {
            return School::whereHas('programs', fn ($q) => $q->whereHas('accreditationBodies'))
                ->orderBy('name')
                ->get();
        });

        $programs = Cache::remember('accred-schools:programs:v2', $ttl, function () {
            return SchoolProgram::select(['id', 'name', 'slug', 'school_id'])
                ->with(['school:id,slug,name'])
                ->whereHas('accreditationBodies')
                ->whereHas('school')
                ->orderBy('name')
                ->get();
        });

        return view('list_schools_accreds', compact('accreditations',  'schools',  'domains', 'programs', 'superDomains'));
    }

    public function comparison()
    {
        return view('comparison_schools');
    }
}
