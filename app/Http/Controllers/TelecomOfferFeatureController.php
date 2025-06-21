<?php

namespace App\Http\Controllers;

use App\Models\TelecomOfferFeature;
use App\Models\TelecomOffer;
use Illuminate\Http\Request;

class TelecomOfferFeatureController extends Controller
{
    public function index()
    {
        return view('dashboard.telecom_offer_features.index');
    }

    public function create()
    {
        return view('dashboard.telecom_offer_features.form', [
            'feature' => new TelecomOfferFeature(),
            'offers' => TelecomOffer::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'telecom_offer_id' => 'required|exists:telecom_offers,id',
            'name' => 'nullable|string|max:255',
            'capacity' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'nullable',
            'is_highlighted' => 'boolean',
        ]);

        TelecomOfferFeature::create($validated);

        return redirect()->route('telecom_offer_feature.index')->with('success', 'Feature created.');
    }

    public function edit(TelecomOfferFeature $telecom_offer_feature)
    {
        return view('dashboard.telecom_offer_features.form', [
            'feature' => $telecom_offer_feature,
            'offers' => TelecomOffer::all(),
        ]);
    }

    public function update(Request $request, TelecomOfferFeature $telecom_offer_feature)
    {
        $validated = $request->validate([
            'telecom_offer_id' => 'required|exists:telecom_offers,id',
            'name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'nullable',
            'is_highlighted' => 'boolean',
        ]);

        $telecom_offer_feature->update($validated);

        return redirect()->route('telecom_offer_feature.index')->with('success', 'Feature updated.');
    }

    public function destroy(TelecomOfferFeature $telecom_offer_feature)
    {
        $telecom_offer_feature->delete();

        return redirect()->route('telecom_offer_feature.index')->with('success', 'Feature deleted.');
    }
}
