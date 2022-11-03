<?php

namespace App\Containers\AppSection\LandingPage\Tasks;

use App\Containers\AppSection\LandingPage\Data\Repositories\LandingPageRepository;
use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateLandingPageTask extends ParentTask
{
    public function __construct(
        protected LandingPageRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): LandingPage
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
