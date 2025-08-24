<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\BankStoreRequest;
use App\Models\Bank;
use App\Models\Image;
use App\Services\ImageService;
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

    // app/Http/Controllers/BankController.php
    public function create()
    {
        // $this->authorize('create', \App\Models\Bank::class);
        $bank = new Bank();
        return view('dashboard.banks.form', compact('bank')); // form Blade
    }

    public function store(BankStoreRequest $request)
    {
        $data = $request->validated();

        if ($bank = Bank::create($data)) {
            if (! empty($request->hasFile('logo_path'))) {
                $path = Image::storeAndOptimize($data['logo_path'], 'logos', true);
                $data['logo_path'] = $request->file('logo_path')->store('logos', 'public');

                $bank->images()->create(['path' => $path, 'is_primary' => true]);
            }

            return redirect()->route('bank.index')->with('success', __('banks.bank_created'));
        }
    }

    public function show(Bank $bank)
    {
        // Inclure relations de base
        return $bank->loadCount(['branches','atms','products']);
    }

    public function edit(\App\Models\Bank $bank)
    {
        // $this->authorize('update', $bank);
        return view('dashboard.banks.form', compact('bank'));
    }

    public function update(BankStoreRequest $request, Bank $bank, ImageService $imageService)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $bank->images()->delete();
            $imageService->store(
                $file,
                $bank,
                [
                    'is_default' => true,
                    'alt_text'   => $bank->name,
                    'caption'    => $bank->name,
                    'sort_order' => 1,
                ]
            );

        }

        $bank->update($validated);
        return redirect()->back()->with('success', __('banks.updated'));
        $bank->update($request->validated());
        return response()->json($bank);
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response()->noContent();
    }
}
