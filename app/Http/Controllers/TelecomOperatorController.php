<?php

namespace App\Http\Controllers;

use App\Models\TelecomOfferFeature;
use App\Models\TelecomOperator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TelecomOperatorController extends Controller
{
    /**
     * This is the list of the operators
     *
     * @return Factory|View|Application|object
     */
    public function operators()
    {
        $operators = TelecomOperator::orderBy('name')->get();
        return view('operators', compact('operators'));
    }

    /**
     * This is the page os a sing operator
     *
     * @param TelecomOperator $operator
     * @return Factory|View|Application|object
     */
    public function operator(TelecomOperator $operator)
    {
        $operators = TelecomOperator::all()->reject(fn ($ope) => $ope == $operator);
        return view('operator', compact('operator',  'operators'));
    }

    /**
     *
     */
    public function telecomsComparison()
    {
        $operators = TelecomOperator::all();
        return view('telecoms_comparison', compact('operators'));
    }

    /**
     *
     */
    public function passComparison()
    {
        $operators = TelecomOfferFeature::all();
        return view('pass_comparison', compact('operators'));
    }

    public function scores()
    {
        return view('scores');
    }
}
