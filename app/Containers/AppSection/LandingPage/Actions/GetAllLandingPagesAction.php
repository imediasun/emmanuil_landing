<?php

namespace App\Containers\AppSection\LandingPage\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\LandingPage\Tasks\GetAllLandingPagesTask;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\GetAllLandingPagesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLandingPagesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllLandingPagesRequest $request): mixed
    {
        return app(GetAllLandingPagesTask::class)->run();
    }
}
