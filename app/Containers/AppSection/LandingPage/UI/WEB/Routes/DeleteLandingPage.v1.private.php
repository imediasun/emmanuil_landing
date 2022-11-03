<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('landing-pages/{id}', [Controller::class, 'destroy'])
    ->middleware(['auth:web']);

