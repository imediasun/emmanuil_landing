<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('landing-pages/{id}', [Controller::class, 'show'])
    ->middleware(['auth:web']);

