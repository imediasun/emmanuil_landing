<?php

namespace App\Containers\AppSection\LandingPage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Containers\AppSection\LandingPage\Tasks\UpdateLandingPageTask;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\UpdateLandingPageRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLandingPageAction extends ParentAction
{
    /**
     * @param UpdateLandingPageRequest $request
     * @return LandingPage
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateLandingPageRequest $request): LandingPage
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateLandingPageTask::class)->run($data, $request->id);
    }
}
