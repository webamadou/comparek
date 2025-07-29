<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;

class SchoolAjaxController
{
    public function index(Request $request)
    {
        $query = School::query();

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
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('level', $request->level);
            });
        }

        if ($request->has('language') && ! empty($request->language)) {
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('language', $request->language);
            });
        }

        if ($request->has('modalite') && ! empty($request->modalite)) {
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('modality', $request->modalite);
            });
        }

        if ($request->has('domain') && ! empty($request->domain)) {
            $query->whereHas('programs.domains', function ($q) use ($request) {
                return $q->where('program_domains.id', $request->domain);
            });
        }

        if ($request->has('double_diplomes') && ! empty($request->double_diplomes)) {
            $query->whereHas('programs.features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [2]);
            });
        }

        if ($request->has('internership') && ! empty($request->internership)) {
            $query->whereHas('programs.features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [1]);
            });
        }

        if ($request->has('accreditations')) {
            $query->whereHas('programs.accreditationBodies', function ($q) use ($request) {
                $q->whereIn('accreditation_bodies.id', $request->accreditations);
            });
        }

        $schools = $query
            ->with('programs')
            ->with('programs.accreditationBodies')
            ->get();

        return view('partials.schools-list', compact('schools'));
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
        $schoolId = $request->schoolId;

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
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('level', $request->level);
            });
        }

        if ($request->has('language') && ! empty($request->language)) {
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('language', $request->language);
            });
        }

        if ($request->has('modalite') && ! empty($request->modalite)) {
            $query->whereHas('programs', function ($q) use ($request) {
                $q->where('modality', $request->modalite);
            });
        }

        if ($request->has('domain') && ! empty($request->domain)) {
            $query->whereHas('programs.domains', function ($q) use ($request) {
                return $q->where('program_domains.id', $request->domain);
            });
        }

        if ($request->has('double_diplomes') && ! empty($request->double_diplomes)) {
            $query->whereHas('programs.features', function ($q) use ($request) {
                $q->whereIn('program_features.id', [2]);
            });
        }

        if ($request->has('accreditations')) {
            $query->whereHas('programs.accreditationBodies', fn ($q) => $q->whereIn('accreditation_bodies.id', $request->accreditations));
        }

        $schools = $query
            ->whereHas('programs', fn ($q) => $q->whereHas('accreditationBodies'))
            ->with('programs')
            ->get();

        return view('partials.schools-list-accreds', compact('schools'));
    }
}
