<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('landing-pages/{id}/edit', [Controller::class, 'edit'])
    ->middleware(['auth:web']);

