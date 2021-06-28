<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    function setLocale(Request $request)
    {
        session()->put('locale', $request->localeName);
        return back();
    }
}
