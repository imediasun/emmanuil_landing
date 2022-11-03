<?php

use App\Containers\AppSection\LandingPage\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('landing-pages/{id}', [Controller::class, 'update'])
    ->middleware(['auth:web']);

