<?php

namespace App\Containers\AppSection\LandingPage\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class LandingPageRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
