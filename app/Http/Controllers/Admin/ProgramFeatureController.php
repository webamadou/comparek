<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramFeature;
use Illuminate\Http\Request;

class ProgramFeatureController extends Controller
{
    public function index()
    {
        return view('dashboard.program_features.index');
    }

    public function create()
    {
        $programFeature = new ProgramFeature();
        return view('dashboard.program_features.form', compact('programFeature'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProgramFeature::create($validated);

        return redirect()->route('program_features.index')->with('success', __('schools.program_feature_created'));
    }

    public function show(ProgramFeature $programFeature)
    {}

    public function edit(ProgramFeature $programFeature)
    {
        return view('dashboard.program_features.form', compact('programFeature'));
    }

    public function update(Request $request, ProgramFeature $programFeature)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $programFeature->update($validated);

        return redirect()->route('program_features.index')->with('success', __('schools.program_feature_updated'));
    }
}
