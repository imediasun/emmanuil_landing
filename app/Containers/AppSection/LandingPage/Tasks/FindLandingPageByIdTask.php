<?php

namespace App\Containers\AppSection\LandingPage\Tasks;

use App\Containers\AppSection\LandingPage\Data\Repositories\LandingPageRepository;
use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindLandingPageByIdTask extends ParentTask
{
    public function __construct(
        protected LandingPageRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): LandingPage
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
