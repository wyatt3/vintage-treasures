<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Hours;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hours = Hours::all();
        return view('home', ['hours' => $hours]);
    }
}
