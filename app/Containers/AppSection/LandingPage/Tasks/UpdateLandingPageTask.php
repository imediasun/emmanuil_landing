<?php

namespace App\Containers\AppSection\LandingPage\Tasks;

use App\Containers\AppSection\LandingPage\Data\Repositories\LandingPageRepository;
use App\Containers\AppSection\LandingPage\Models\LandingPage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateLandingPageTask extends ParentTask
{
    public function __construct(
        protected LandingPageRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): LandingPage
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
