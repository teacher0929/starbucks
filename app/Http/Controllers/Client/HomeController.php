<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }


    public function locale($locale)
    {
        session()->put('locale', $locale == 'ru' ? 'ru' : 'en');

        return redirect()->back();
    }
}
