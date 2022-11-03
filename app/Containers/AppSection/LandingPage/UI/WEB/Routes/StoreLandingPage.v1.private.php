<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('landing-pages/store', [Controller::class, 'store'])
    ->middleware(['auth:web']);

