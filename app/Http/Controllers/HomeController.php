<?php

namespace App\Http\Controllers;

use App\Models\TelecomOperator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $illus = collect([2, 3, 5])->random();
        return view('home',  compact('illus'));
    }

    public function operators()
    {
        $operators = TelecomOperator::orderBy('name')->get();
        return view('operators', compact('operators'));
    }
}
