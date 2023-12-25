<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('menupages.sts');
    }

    public function getForex() {
        return view('menupages.forex');
    }
}
