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
            'data_volume_value' => 'nullable|string|max:255',
            'data_volume_unit' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'is_highlighted' => 'boolean',
            'voice_minutes' => 'nullable|integer|min:0',
            'is_voice_unlimited' => 'boolean',
            'sms_nbr' => 'nullable|integer|min:0',
            'internet_speed_value' => 'nullable|numeric|min:0',
            'internet_speed_unit' => 'nullable|string|max:50',
            'nbr_tv' => 'nullable|integer|min:0',
            'validity_length' => 'nullable|integer|min:0',
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
            'data_volume_value' => 'nullable|string|max:255',
            'data_volume_unit' => 'nullable|string|max:50',
            'price' => 'nullable',
            'is_highlighted' => 'boolean',
            'voice_minutes' => 'nullable|integer|min:0',
            'is_voice_unlimited' => 'boolean',
            'sms_nbr' => 'nullable|integer|min:0',
            'internet_speed_value' => 'nullable|numeric|min:0',
            'internet_speed_unit' => 'nullable|string|max:50',
            'nbr_tv' => 'nullable|integer|min:0',
            'validity_length' => 'nullable|integer|min:0',
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
