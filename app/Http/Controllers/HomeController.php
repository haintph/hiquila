<?php

namespace App\Http\Controllers;

use App\Models\Slider;

class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::all();
        return view('client.index', compact('sliders'));
    }
}
