<?php

namespace App\Containers\AppSection\LandingPage\Actions;

use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Containers\AppSection\LandingPage\Tasks\FindLandingPageByIdTask;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\FindLandingPageByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindLandingPageByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindLandingPageByIdRequest $request): LandingPage
    {
        return app(FindLandingPageByIdTask::class)->run($request->id);
    }
}
