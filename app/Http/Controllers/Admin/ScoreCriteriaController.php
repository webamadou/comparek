<?php

namespace App\Http\Controllers\Admin;

use App\ComparekEnum;
use App\Http\Controllers\Controller;
use App\Models\ScoreCriteria;
use Illuminate\Http\Request;

class ScoreCriteriaController extends Controller
{
    public function index()
    {
        return view('dashboard.score_criteria.index');
    }

    public function create()
    {
        return view('dashboard.score_criteria.form', [
            'criteria' => new ScoreCriteria(),
            'verticals' => ComparekEnum::cases(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vertical' => ['required', 'in:' . implode(',', ComparekEnum::values())],
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        ScoreCriteria::create($validated);

        return redirect()->route('score_criteria.index')->with('success', 'Critère enregistré.');
    }

    public function edit($score_criteria)
    {
        $item = ScoreCriteria::find($score_criteria);
        return view('dashboard.score_criteria.form', [
            'criteria' => $item,
            'verticals' => ComparekEnum::cases(),
        ]);
    }

    public function update(Request $request, $score_criteria)
    {
        $validated = $request->validate([
            'vertical' => ['required', 'in:' . implode(',', ComparekEnum::values())],
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0|max:100',
        ]);
        $score_criteria = ScoreCriteria::find($score_criteria);

        $score_criteria->update($validated);

        return redirect()->route('score_criteria.index')->with('success', 'Critère mis à jour.');
    }

    public function destroy($score_criteria)
    {
        if (ScoreCriteria::find($score_criteria)->delete())
        {
            return redirect()->route('score_criteria.index')->with('success', 'Critère supprimé!');
        }

        return redirect()->route('score_criteria.index')->with('error', 'Erreur!');
    }
}
