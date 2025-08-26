<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $q        = trim($request->string('q')->toString());
        $category = $request->string('category')->toString();   // bank|eme|sfd
        $digital  = $request->boolean('digital');               // filtre simple: a une app / internet banking ?
        $city     = $request->string('city')->toString();

        $banks = Bank::query()
            ->where('is_active', true)
            ->when($q !== '', fn($qb) => $qb->where('name','like',"%$q%"))
            ->when($category !== '', fn($qb) => $qb->where('category',$category))
            // exemple de filtre simple "digital": banque qui a au moins 1 produit actif de type digital_banking
            ->when($digital, fn($qb) => $qb->whereHas('products', fn($p) =>
            $p->where('product_type','digital_banking')->where('is_active',true)))
            // exemple de filtre ville (présence d'une agence)
            ->when($city !== '', fn($qb) => $qb->whereHas('branches', fn($br) => $br->where('city','like',"%$city%")))
            ->withCount(['branches','atms','products'])
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        // pour le filtre ville (suggestions)
        $cities = Cache::remember('bank_cities', 3600, fn() =>
        DB::table('branches')->selectRaw('city, count(*) as c')->whereNotNull('city')
            ->groupBy('city')->orderBy('city')->pluck('city')->all()
        );

        return view('list_banks', compact('banks', 'q', 'category', 'cities', 'digital'));
    }

    public function show(Bank $bank)
    {

    }

    public function compare(Request $request)
    {

    }
}
