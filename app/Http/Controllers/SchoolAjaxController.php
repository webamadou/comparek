<?php

namespace App\Http\Controllers;

use App\Models\ProgramDomain;
use App\Models\ProgramSuperDomain;
use App\Models\School;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;

class SchoolAjaxController
{
    public function index(Request $request)
    {
        $query = School::query();
        $queryProgram = SchoolProgram::query();
        $isProgramFilter = ! empty($request->type) && $request->type === 'program';

        if ($request->has('city') && ! empty($request->city)) {
            $query->where('city', $request->city);
        }

        if ($request->has('is_private') && ! empty($request->is_private)) {
            $query->where('is_private', $request->is_private);
        }

        if ($request->has('foreign') && ! empty($request->foreign)) {
            $query->where('accepts_foreign_students', true);
        }

        if ($request->has('level') && ! empty($request->level)) {
            $queryProgram->where('level', $request->level);
        }

        if ($request->has('language') && ! empty($request->language)) {
            $queryProgram->where('language', $request->language);
        }

        if ($request->has('modalite') && ! empty($request->modalite)) {
            $queryProgram->where('modality', $request->modalite);
        }

        if ($request->has('domain') && ! empty($request->domain)) {
            $queryProgram->whereHas('domains', function ($q) use ($request) {
                return $q->where('program_domains.id', $request->domain);
            });
        }

        if ($request->has('double_diplomes') && ! empty($request->double_diplomes)) {
            $query->whereHas('features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [2]);
            });
        }

        if ($request->has('internership') && ! empty($request->internership)) {
            $query->whereHas('features', function ($q) use ($request) {
                $q->whereIn('id', [1]);
            });
        }

        if ($request->has('accreditations')) {
            $query->whereHas('programs.accreditationBodies', function ($q) use ($request) {
                $q->whereIn('accreditation_bodies.id', $request->accreditations);
            });
        }

        if ($request->has('paccreditations')) {
            $queryProgram->whereHas('accreditationBodies', function ($q) use ($request) {
                $q->whereIn('accreditation_bodies.id', $request->paccreditations);
            });
        }

        // We need this list for the filter dropdown
        $superDomains = ProgramSuperDomain::orderBy('slug')->pluck('name', 'id');
        $domains = collect();

        // If a super domain is selected, we need to filter the domain dropdown
        if ($request->filled('super_domain_id')) {
            $domains = ProgramDomain::where('super_domain_id', $request->integer('super_domain_id'))
                        ->orderBy('name')
                        ->pluck('name', 'id');
        }

        if ($isProgramFilter) {
            $programs = $queryProgram
                ->orderBy('name')
                ->get();

            return view('partials.school-programs-list', compact('programs', 'superDomains'));
        }
        else {
            $schools = $query
                ->with('programs')
                ->orderBy('name')
                ->get();

            return view('partials.schools-list', compact('schools', 'superDomains'));
        }
    }

    public function schoolProgramFilter(Request $request)
    {
        $query = SchoolProgram::query();
        $schoolId = $request->schoolId;
        if ($request->has('level') && ! empty($request->level)) {
            $query->where('level', $request->level);
                /*->whereHas('programs', function ($q) use ($request) {
                $q->where('level', $request->level);
            });*/
        }

        if ($request->has('language') && ! empty($request->language)) {
            $query->where('language', $request->language);
                /*->whereHas('programs', function ($q) use ($request) {
                $q->where('language', $request->language);
            });*/
        }

        if ($request->has('modalite') && ! empty($request->modalite)) {
            $query->where('modality', $request->modalite);
                /*->whereHas('programs', function ($q) use ($request) {
                $q->where('modality', $request->modalite);
            });*/
        }

        if ($request->has('domain') && ! empty($request->domain)) {
            $query->whereHas('domains', function ($q) use ($request) {
                return $q->where('program_domains.id', $request->domain);
            });
        }

        if ($request->has('double_diplomes') && ! empty($request->double_diplomes)) {
            $query->whereHas('features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [2]);
            });
        }

        if ($request->has('accreditations')) {
            $query->whereHas('accreditationBodies', function ($q) use ($request) {
                $q->whereIn('accreditation_bodies.id', $request->accreditations);
            });
        }

        $programs = $query
            ->where('school_id', $schoolId)
            ->with('features')
            ->get();

        return view('partials.school-programs-list', compact('programs'));
    }

    public function accredSchoolProgramFilter(Request $request)
    {
        $query = School::query();
        $queryProgram = SchoolProgram::query();
        $schoolId = $request->schoolId;
        $isProgramFilter = ! empty($request->type) && $request->type === 'program';

        if ($request->has('city') && ! empty($request->city)) {
            $query->where('city', $request->city);
        }

        if ($request->has('is_private') && ! empty($request->is_private)) {
            $query->where('is_private', $request->is_private);
        }

        if ($request->has('foreign') && ! empty($request->foreign)) {
            $query->where('accepts_foreign_students', true);
        }

        if ($request->has('level') && ! empty($request->level)) {
            $queryProgram->where('level', $request->level);
        }

        if ($request->has('language') && ! empty($request->language)) {
            $queryProgram->where('language', $request->language);
        }

        if ($request->has('modalite') && ! empty($request->modalite)) {
            $queryProgram->whereHas('programs', function ($q) use ($request) {
                $q->where('modality', $request->modalite);
            });
        }

        if ($request->has('domain') && ! empty($request->domain)) {
            $queryProgram->whereHas('domains', function ($q) use ($request) {
                return $q->where('program_domains.id', $request->domain);
            });
        }

        if ($request->has('double_diplomes') && ! empty($request->double_diplomes)) {
            $queryProgram->whereHas('features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [2]);
            });
        }

        if ($request->has('accreditations')) {
            $query->whereHas('programs.accreditationBodies', fn ($q) => $q->whereIn('accreditation_bodies.id', $request->accreditations));
        }

        if ($request->has('paccreditations')) {
            $queryProgram->whereHas('accreditationBodies', fn ($q) => $q->whereIn('accreditation_bodies.id', $request->paccreditations));
        }

        if ($isProgramFilter) {
            $programs = $queryProgram->whereHas('accreditationBodies')
                ->orderBy('name')
                ->get();

            return view('partials.school-programs-list', compact('programs'));
        }
        else {
            $schools = $query
                ->whereHas('programs', fn($q) => $q->whereHas('accreditationBodies'))
                ->with('programs')
                ->orderBy('name')
                ->get();
            return view('partials.schools-list-accreds', compact('schools'));
        }
    }

    /**
     * Get the list of program domains for a given super domain.
    */
    public function programDomains(Request $request)
    {
        $request->validate([
            'super_domain_id' => ['required', 'integer', 'exists:program_super_domains,id'],
        ]);

        $domains = ProgramDomain::where('super_domain_id', $request->input('super_domain_id'))
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'data' => $domains,
        ]);
    }
}
