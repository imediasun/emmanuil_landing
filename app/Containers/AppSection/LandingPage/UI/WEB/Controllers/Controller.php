<?php

namespace App\Containers\AppSection\LandingPage\UI\WEB\Controllers;

use App\Containers\AppSection\LandingPage\Actions\CreateLandingPageAction;
use App\Containers\AppSection\LandingPage\Actions\DeleteLandingPageAction;
use App\Containers\AppSection\LandingPage\Actions\FindLandingPageByIdAction;
use App\Containers\AppSection\LandingPage\Actions\GetAllLandingPagesAction;
use App\Containers\AppSection\LandingPage\Actions\UpdateLandingPageAction;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\CreateLandingPageRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\DeleteLandingPageRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\EditLandingPageRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\FindLandingPageByIdRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\GetAllLandingPagesRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\StoreLandingPageRequest;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\UpdateLandingPageRequest;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        return view('appSection@landingPage::welcome-page');

    }

    public function show(FindLandingPageByIdRequest $request)
    {
        $landingpage = app(FindLandingPageByIdAction::class)->run($request);
        // ..
    }

    public function create(CreateLandingPageRequest $request)
    {
        // ..
    }

    public function store(StoreLandingPageRequest $request)
    {
        $landingpage = app(CreateLandingPageAction::class)->run($request);
        // ..
    }

    public function edit(EditLandingPageRequest $request)
    {
        $landingpage = app(FindLandingPageByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateLandingPageRequest $request)
    {
        $landingpage = app(UpdateLandingPageAction::class)->run($request);
        // ..
    }

    public function destroy(DeleteLandingPageRequest $request)
    {
         $result = app(DeleteLandingPageAction::class)->run($request);
         // ..
    }
}
