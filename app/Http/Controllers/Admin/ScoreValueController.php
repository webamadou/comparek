<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScoreCriteria;
use App\Models\ScoreValue;
use Illuminate\Http\Request;

class ScoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.score_value.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.score_value.form', [
            'score' => new ScoreValue(),
            'criteria' =>  ScoreCriteria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'score_criteria_id' => ['required', 'exists:score_criterias,id'],
            'vertical_entity_type' => ['required', 'string', 'max:255'],
            'vertical_entity_id' => ['required', 'integer'],
            'value' => ['required', 'numeric', 'max:10'],
        ]);

        ScoreValue::create($validated);

        return redirect()->route('score_value.index')->with('success', 'Score créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ScoreValue $scoreValue)
    {
        dd($scoreValue);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoreValue $scoreValue)
    {
        return view('dashboard.score_value.form', [
            'score' => $scoreValue,
            'criteria' => ScoreCriteria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoreValue $scoreValue)
    {
        $validated = $request->validate([
            'score_criteria_id' => ['required', 'exists:score_criterias,id'],
            'vertical_entity_type' => ['required', 'string', 'max:255'],
            'vertical_entity_id' => ['required', 'integer'],
            'value' => ['required', 'numeric',  'max:10'],
        ]);

        $scoreValue->update($validated);

        return redirect()->route('score_value.index')->with('success', 'Score mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoreValue $scoreValue)
    {
        $scoreValue->delete();

        return redirect()->route('dashboard.score_value.index')->with('success', 'Score supprimé avec succès !');
    }
}
