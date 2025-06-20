<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TelecomOperatorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TelecomOperatorRequest;
use App\Models\TelecomOperator;

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

        if ($request->hasFile('logo_path')) {
            $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');
        }

        TelecomOperator::create($data);

        return redirect()->route('telecom_operator.index')->with('success', 'Operator created.');
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
    public function update(TelecomOperatorRequest $request, TelecomOperator $telecom_operator)
    {
        $data = $request->validated();

        if ($request->hasFile('logo_path')) {
            $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');
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
