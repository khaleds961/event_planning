<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Log;


class LanguageController extends Controller
{
    public function toggleLanguage($lang = null)
    {
        // If the language is not provided, use the default
        $newLanguage = $lang ?: config('app.locale');

        App::setLocale($newLanguage);
        // Destroy the existing session
        session()->forget('custom_locale');

        // Set the session with the new language
        session()->put('custom_locale', $newLanguage);
        return redirect()->back();
    }
}
