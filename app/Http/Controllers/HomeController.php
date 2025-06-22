<?php

namespace App\Http\Controllers;

use App\Models\TelecomOperator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function operators()
    {
        $operators = TelecomOperator::orderBy('name')->get();
        return view('operators', compact('operators'));
    }
}
