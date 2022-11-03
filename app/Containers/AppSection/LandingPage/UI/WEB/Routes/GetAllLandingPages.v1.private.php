<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/landing-page/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'nl', 'fr', 'ua'])) {
        abort(400);
    }

    App::setLocale($locale);
    return App::call('App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller@index');
});

