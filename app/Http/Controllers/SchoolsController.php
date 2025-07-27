<?php

namespace App\Http\Controllers;

use App\Models\AccreditationBody;
use App\Models\ProgramDomain;
use App\Models\School;
use Illuminate\Http\Request;

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
        $accreditations = AccreditationBody::whereNotIn('id', [1,2,3])->orderBy('name')->pluck('name', 'id')->toArray();
        $domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();
        $schools = School::whereHas('programs', fn ($q) => $q->whereHas('accreditationBodies'))->orderBy('name')->get();
        // $accreditations = $schools->filter(function ($school) {})

        return view('list_schools_accreds',  compact('accreditations',  'schools',  'domains'));
    }

    public function comparison()
    {
        return view('comparison_schools');
    }
}
