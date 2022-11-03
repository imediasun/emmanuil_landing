<?php

namespace App\Containers\AppSection\LandingPage\Actions;

use App\Containers\AppSection\LandingPage\Tasks\DeleteLandingPageTask;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\DeleteLandingPageRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteLandingPageAction extends ParentAction
{
    /**
     * @param DeleteLandingPageRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteLandingPageRequest $request): int
    {
        return app(DeleteLandingPageTask::class)->run($request->id);
    }
}
