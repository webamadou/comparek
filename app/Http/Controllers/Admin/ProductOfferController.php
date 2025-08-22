<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductOfferStoreRequest;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductOffer::class, 'product_offer');
    }

    public function index(Request $request)
    {
        $query = ProductOffer::query()
            ->with(['product:id,bank_id,name,product_type','product.bank:id,name'])
            ->when($request->filled('bank_product_id'), fn($q) => $q->where('bank_product_id', $request->bank_product_id))
            ->when($request->filled('is_active'), fn($q) => $q->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN)))
            ->when($request->filled('q'), fn($q) =>
            $q->where('name','like','%'.$request->q.'%')->orWhere('slug','like','%'.$request->q.'%'));

        return $query->latest('id')->paginate($request->integer('per_page', 15));
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
