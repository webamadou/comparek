<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $illus = collect([2, 3, 5])->random();
        return view('home',  compact('illus'));
    }
}
