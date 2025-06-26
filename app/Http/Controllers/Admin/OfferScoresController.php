<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScoreCriteria;
use App\Models\ScoreValue;
use App\Models\TelecomOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfferScoresController extends Controller
{
    public function edit(TelecomOffer $offer)
    {
        $criteria = ScoreCriteria::pluck('name', 'id');
        return view('dashboard.offers_scores.edit', compact('offer', 'criteria'));
    }

    public function update(Request $request, TelecomOffer $offer)
    {
        $valiatedData = $request->validate([
            'score.*' => 'nullable|numeric|min:0|max:10',
        ]);

        foreach($valiatedData['score'] as $key => $val){
            if ($val !== null) {
                $score = $offer->scoreValues->where('score_criteria_id', $key)->first() ?? $offer->scoreValues()->create(['score_criteria_id' => $key, 'value' => 0]);
                $score->update(['value' => $val]);
            }
        }

        return redirect()->back()->with('success', 'Score updated successfully');
    }
}
