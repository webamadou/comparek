<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProductOfferStoreRequest;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.bank_offers.index', []);
    }

    public function store(ProductOfferStoreRequest $request)
    {
        $offer = ProductOffer::create($request->validated());
        return response()->json($offer, 201);
    }

    public function show(ProductOffer $product_offer)
    {
        return $product_offer->load(['product.bank','features','fees','rates']);
    }

    public function update(ProductOfferUpdateRequest $request, ProductOffer $product_offer)
    {
        $product_offer->update($request->validated());
        return response()->json($product_offer);
    }

    public function destroy(ProductOffer $product_offer)
    {
        $product_offer->delete();
        return response()->noContent();
    }
}
