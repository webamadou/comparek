<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TelecomOffer;
use App\Models\TelecomOperator;
use App\Models\TelecomServiceType;
use App\TechnologyEnum;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'price_per_month' => 'nullable|numeric|min:0',
            'is_postpaid' => 'boolean',
            'has_commitment' => 'boolean',
            'commitment_duration_months' => 'nullable|integer|min:1',
            'activation_fee' => 'nullable|numeric|min:0',
            'image_path' => 'nullable|string',
            'available_online' => 'boolean',
            'debit' =>  'nullable|numeric|min:1',
            'debit_unit' => 'required_with:debit|' . Rule::in(['Mo', 'Go']),
            'technology' => 'nullable|string|' . Rule::in(TechnologyEnum::cases()),
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
            'price_per_month' => 'nullable|numeric|min:0',
            'is_postpaid' => 'boolean',
            'has_commitment' => 'boolean',
            'commitment_duration_months' => 'nullable|integer|min:1',
            'activation_fee' => 'nullable|numeric|min:0',
            'image_path' => 'nullable|string',
            'available_online' => 'boolean',
            'debit' =>  'nullable|numeric|min:1',
            'debit_unit' => 'required_with:debit|' . Rule::in(['mo', 'go']),
            'technology' => 'nullable|string|' . Rule::in(TechnologyEnum::values()),
        ]);

        $telecom_offer->update($validated);

        return redirect()->route('telecom_offer.index')->with('success', 'Offer updated.');
    }

    public function destroy(TelecomOffer $telecom_offer)
    {
        $telecom_offer->delete();

        return redirect()->route('telecom_offer.index')->with('success', 'Offer deleted.');
    }

    public function score(TelecomOffer $telecomOffer)
    {
        dd($telecomOffer->currentScore());
    }

    public function show(TelecomOffer $telecomOffer)
    {
        return view('dashboard.telecom_offers.show', compact('telecomOffer'));
    }
}
