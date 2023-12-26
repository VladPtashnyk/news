<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizationController extends Controller
{
    public function changeLocale($locale)
    {
        Session::put('locale', $locale);
        App::setlocale($locale);

        return redirect()->back();
    }
}

