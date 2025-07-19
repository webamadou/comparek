<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use App\Models\Image;
use Illuminate\Support\Facades\Request;
use App\Services\ImageService;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()->paginate(10);
        return view('dashboard/schools/index', compact('schools'));
    }

    public function create()
    {
        $school = new School();
        return view('dashboard.schools.form', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $data = $request->validated();

        if ($telecom_operator = School::create($data)) {
            if (! empty($request->hasFile('logo_path'))) {
                $path = Image::storeAndOptimize($data['logo_path'], 'logos', true);
                $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');

                $telecom_operator->images()->create(['path' => $path, 'is_primary' => true]);
            }

            return redirect()->route('schools.index')->with('success', __('schools.school_created'));
        }

        return back()->withInput()->with('error', __('commons.error_occurred'));
    }

    public function edit(School $school)
    {
        return view('dashboard.schools.form', compact('school'));
    }

    public function update(SchoolRequest $request, School $school, ImageService $imageService)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $school->images()->delete();
            $imageService->store(
                $file,
                $school,
                [
                    'is_default' => true,
                    'alt_text'   => $school->name,
                    'caption'    => $school->name,
                    'sort_order' => 1,
                ]
            );

        }

        $school->update($validated);
        return redirect()->route('schools.index')->with('success', __('schools.updated'));
    }

    public function destroy(School $school)
    {
        $school->delete();
        return back()->with('success', __('schools.deleted'));
    }
}
