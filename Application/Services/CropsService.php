<?php

namespace Modules\Crops\Application\Services;

use Modules\Core\Application\BaseService;
use Modules\Crops\Application\Contracts\ICropsService;
use Modules\Crops\Domain\Interfaces\ICropsRepository;

class CropsService extends BaseService implements ICropsService
{
    public function __construct(ICropsRepository $repository)
    {
        parent::__construct($repository);
    }
}