<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('landing-pages/create', [Controller::class, 'create'])
    ->middleware(['auth:web']);

