<?php

namespace App\Http\Controllers;

use App\Models\SchoolProgram;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\SchoolProgram $program)
    {
        $accreditations = $program->accreditationBodies->pluck('name');
        $domains = $program->domains()->pluck('name');
        $similarPrograms = SchoolProgram::where('id', '!=', $program->id)
            ->where('level', $program->level->value)
            ->whereHas('domains', function ($query) use ($domains) {
                $query->whereIn('name', $domains->toArray());
            })
            ->take(4)
            ->get();

        return view('view_program', compact('program', 'accreditations', 'domains',  'similarPrograms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
