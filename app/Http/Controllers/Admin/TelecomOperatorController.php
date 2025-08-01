<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TelecomOperatorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TelecomOperatorRequest;
use App\Models\Image;
use App\Models\TelecomOperator;
use App\Services\ImageService;

class TelecomOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operators = TelecomOperator::latest()->paginate(10);
        return view('dashboard.telecom_operators.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.telecom_operators.edit', ['operator' => new TelecomOperator()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TelecomOperatorRequest $request)
    {
        $data = $request->validated();

        if ($telecom_operator = TelecomOperator::create($data)) {
            if ($request->hasFile('logo_path')) {
                $path = Image::storeAndOptimize($data['logo_path'], 'logos', true);
                $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');

                $telecom_operator->images()->create(['path' => $path, 'is_primary' => true]);
            }

            return redirect()->route('telecom_operator.index')->with('success', 'Operator created.');
        }

        return back()->withInput()->with('error', 'Error!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TelecomOperator $telecomOperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TelecomOperator $telecom_operator)
    {
        return view('dashboard.telecom_operators.edit', ['operator' => $telecom_operator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TelecomOperatorRequest $request, TelecomOperator $telecom_operator, ImageService $imageService)
    {
        $data = $request->validated();

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $telecom_operator->images()->delete();
            $imageService->store(
                $file,
                $telecom_operator,
                [
                    'is_default' => true,
                    'alt_text'   => $telecom_operator->name,
                    'caption'    => $telecom_operator->name,
                    'sort_order' => 1,
                ]
            );
        }

        $telecom_operator->update($data);

        return redirect()->route('telecom_operator.index')->with('success', 'Operator updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TelecomOperator $telecom_operator)
    {
        $telecom_operator->delete();
        return redirect()->route('telecom_operator.index')->with('success', 'Operator deleted.');
    }
}
