<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WineController extends Controller
{
    public function index()
    {
        return view('wine.index');
    }
}