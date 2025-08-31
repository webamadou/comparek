<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolProgramRequest;
use App\Models\AccreditationBody;
use App\Models\ProgramDomain;
use App\Models\ProgramFeature;
use App\Models\School;
use App\Models\SchoolProgram;

class SchoolProgramController extends Controller
{
    public function index()
    {
        return view('dashboard.school_program.index');
    }

    public function create()
    {
        $school_program = new ProgramDomain();
        $schools = School::orderBy('name')->where('is_active', true)->pluck('name', 'id')->toArray();
        $domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();
        $accreditations = AccreditationBody::orderBy('name')->where('is_active', true)->pluck('name', 'id')->toArray();
        $features = ProgramFeature::where('is_active', 1)->orderBy('slug')->pluck('name', 'id')->toArray();

        return view('dashboard.school_program.form', compact('school_program', 'schools', 'domains', 'accreditations', 'features'));
    }

    public function store(SchoolProgramRequest $request)
    {
        $program = SchoolProgram::create(collect($request->validated())->except(['accreditation_ids', 'feature_ids', 'domain_ids'])->toArray());
        $program->accreditationBodies()->sync($request->input('accreditation_ids', []));
        $program->features()->sync($request->input('feature_ids', []));
        $program->domains()->sync($request->input('domain_ids', []));

        return redirect()->route('school_programs.index')->with('success', __('schools.created'));
    }

    public function edit(SchoolProgram $school_program)
    {
        $schools = School::orderBy('name')->where('is_active', true)->pluck('name', 'id')->toArray();
        $domains = ProgramDomain::orderBy('name')->pluck('name', 'id')->toArray();
        $accreditations = AccreditationBody::orderBy('name')->where('is_active', true)->pluck('name', 'id')->toArray();
        $features = ProgramFeature::where('is_active', 1)->orderBy('name')->pluck('slug', 'id')->toArray();

        return view('dashboard.school_program.form', compact('school_program', 'schools', 'domains', 'accreditations', 'features'));
    }

    public function update(SchoolProgramRequest $request, SchoolProgram $schoolProgram)
    {
        $schoolProgram->update(collect($request->validated())->except(['accreditation_ids', 'feature_ids', 'domain_ids'])->toArray());
        $schoolProgram->accreditationBodies()->sync($request->input('accreditation_ids', []));
        $schoolProgram->features()->sync($request->input('feature_ids', []));
        $schoolProgram->domains()->sync($request->input('domain_ids', []));

        return redirect()->back()->with('success', __('schools.updated'));
    }

    public function destroy(SchoolProgram $school_program)
    {
        $school_program->delete();
        return back()->with('success', __('schools.deleted'));
    }
}
