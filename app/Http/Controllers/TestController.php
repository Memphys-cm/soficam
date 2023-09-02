<?php

namespace App\Http\Controllers;

use App\Models\TitreFoncier;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        $titles =  TitreFoncier::with('users')->get();   
        // return view('test', compact('titles'));
        return view('first_test', compact('titles'))->layout('components.layouts.dashboard');
    }
}
