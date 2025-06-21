<?php

namespace App\Http\Controllers;

use App\Models\TelecomOffer;
use App\Models\TelecomOperator;
use App\Models\TelecomServiceType;
use Illuminate\Http\Request;

class TelecomOfferController extends Controller
{
    public function index()
    {
        return view('dashboard.telecom_offers.index');
    }

    public function create()
    {
        return view('dashboard.telecom_offers.form', [
            'offer' => new TelecomOffer(),
            'operators' => TelecomOperator::all(),
            'serviceTypes' => TelecomServiceType::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'telecom_operator_id' => 'required|exists:telecom_operators,id',
            'telecom_service_type_id' => 'required|exists:telecom_service_types,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'price_per_month' => 'required|numeric|min:0',
            'is_postpaid' => 'boolean',
            'has_commitment' => 'boolean',
            'commitment_duration_months' => 'nullable|integer|min:1',
            'activation_fee' => 'nullable|numeric|min:0',
            'image_path' => 'nullable|string',
            'available_online' => 'boolean',
        ]);

        TelecomOffer::create($validated);

        return redirect()->route('telecom_offer.index')->with('success', 'Offer created.');
    }

    public function edit(TelecomOffer $telecom_offer)
    {
        return view('dashboard.telecom_offers.form', [
            'offer' => $telecom_offer,
            'operators' => TelecomOperator::all(),
            'serviceTypes' => TelecomServiceType::all(),
        ]);
    }

    public function update(Request $request, TelecomOffer $telecom_offer)
    {
        $validated = $request->validate([
            'telecom_operator_id' => 'required|exists:telecom_operators,id',
            'telecom_service_type_id' => 'required|exists:telecom_service_types,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'price_per_month' => 'required|numeric|min:0',
            'is_postpaid' => 'boolean',
            'has_commitment' => 'boolean',
            'commitment_duration_months' => 'nullable|integer|min:1',
            'activation_fee' => 'nullable|numeric|min:0',
            'image_path' => 'nullable|string',
            'available_online' => 'boolean',
        ]);

        $telecom_offer->update($validated);

        return redirect()->route('telecom_offer.index')->with('success', 'Offer updated.');
    }

    public function destroy(TelecomOffer $telecom_offer)
    {
        $telecom_offer->delete();

        return redirect()->route('telecom_offer.index')->with('success', 'Offer deleted.');
    }
}
