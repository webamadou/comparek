<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BankProductStoreRequest;
use App\Models\BankProduct;
use Illuminate\Http\Request;

class BankProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(BankProduct::class, 'bank_product');
    }

    public function index(Request $request)
    {
        $query = BankProduct::query()
            ->with('bank:id,name,slug')
            ->when($request->filled('bank_id'), fn($q) => $q->where('bank_id', $request->bank_id))
            ->when($request->filled('product_type'), fn($q) => $q->where('product_type', $request->product_type))
            ->when($request->filled('q'), fn($q) =>
            $q->where('name', 'like', '%'.$request->q.'%')->orWhere('slug','like','%'.$request->q.'%'));

        return $query->latest('id')->paginate($request->integer('per_page', 15));
    }

    public function store(BankProductStoreRequest $request)
    {
        $product = BankProduct::create($request->validated());
        return response()->json($product, 201);
    }

    public function show(BankProduct $bank_product)
    {
        return $bank_product->load(['bank:id,name,slug','offers:id,bank_product_id,name,slug,is_active']);
    }

    public function update(BankProductUpdateRequest $request, BankProduct $bank_product)
    {
        $bank_product->update($request->validated());
        return response()->json($bank_product);
    }

    public function destroy(BankProduct $bank_product)
    {
        $bank_product->delete();
        return response()->noContent();
    }
}
