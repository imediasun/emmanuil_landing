<?php

namespace App\Containers\AppSection\LandingPage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Containers\AppSection\LandingPage\Tasks\CreateLandingPageTask;
use App\Containers\AppSection\LandingPage\UI\WEB\Requests\CreateLandingPageRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLandingPageAction extends ParentAction
{
    /**
     * @param CreateLandingPageRequest $request
     * @return LandingPage
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateLandingPageRequest $request): LandingPage
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateLandingPageTask::class)->run($data);
    }
}
