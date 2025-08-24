<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\BankStoreRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Bank::class, 'bank');
    }

    public function index(Request $request)
    {
        return view('dashboard.banks.index');
    }

    public function store(BankStoreRequest $request)
    {
        $bank = Bank::create($request->validated());
        return response()->json($bank, 201);
    }

    public function show(Bank $bank)
    {
        // Inclure relations de base
        return $bank->loadCount(['branches','atms','products']);
    }

    public function update(BankUpdateRequest $request, Bank $bank)
    {
        $bank->update($request->validated());
        return response()->json($bank);
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response()->noContent();
    }
}
