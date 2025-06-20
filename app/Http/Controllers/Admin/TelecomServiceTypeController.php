<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TelecomServiceTypeRequest;
use App\Models\TelecomServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TelecomServiceTypeController extends Controller
{
    public function index()
    {
        return view('dashboard.telecom_service_types.index');
    }

    public function create()
    {
        return view('dashboard.telecom_service_types.form', [
            'serviceType' => new TelecomServiceType()
        ]);
    }

    public function store(TelecomServiceTypeRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '_');
        TelecomServiceType::create($validated);

        return redirect()->route('telecom_service_type.index')->with('success', 'Operator created.');
    }

    public function edit(TelecomServiceType $telecom_service_type)
    {
        return view('dashboard.telecom_service_types.form', [
            'serviceType' => $telecom_service_type
        ]);
    }

    public function update(Request $request, TelecomServiceType $telecom_service_type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $telecom_service_type->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('telecom_service_type.index')->with('success', 'Service Type updated.');
    }

    public function destroy(TelecomServiceType $telecom_service_type)
    {
        $telecom_service_type->delete();

        return redirect()->route('telecom_service_type.index')->with('success', 'Service Type deleted.');
    }
}
