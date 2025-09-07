<?php

namespace App\Http\Controllers;

use App\Models\AccreditationBody;
use App\Models\ProgramDomain;
use App\Models\School;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SchoolsController extends Controller
{
    public function index()
    {
        $accreditations = AccreditationBody::whereNotIn('id', [1,2,3])->orderBy('name')->pluck('name', 'id')->toArray();
        $domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();
        $schools = School::where('is_active', 1)->orderBy('name')->get();

        return view('list_schools',  compact('accreditations',  'schools',  'domains'));
    }

    public function view(School $school)
    {
        $accreditations = AccreditationBody::whereNotIn('id', [1,2,3])->orderBy('name')->pluck('name', 'id')->toArray();
        $domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();
        $programs = $school->programs;

        return view('view_school', compact('school',  'accreditations', 'domains', 'programs'));
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
        $domains = Cache::remember('accred-schools:domains:v3', $ttl, function () {
            return ProgramDomain::orderBy('name')
                ->orderBy('name')
                ->pluck('name', 'id');
        });

        /*$schools = School::whereHas('programs', fn ($q) => $q->whereHas('accreditationBodies'))->orderBy('name')->get();*/
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

        return view('list_schools_accreds', compact('accreditations',  'schools',  'domains', 'programs'));
    }

    public function comparison()
    {
        return view('comparison_schools');
    }
}
