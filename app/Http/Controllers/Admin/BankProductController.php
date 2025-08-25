<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\BankProductStoreRequest;
use App\Models\BankProduct;
use Illuminate\Http\Request;

class BankProductController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.bank_products.index');
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
