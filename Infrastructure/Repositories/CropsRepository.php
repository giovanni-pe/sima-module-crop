<?php

namespace Modules\Crops\Infrastructure\Repositories;

use Modules\Core\Infrastructure\BaseRepository;
use Modules\Crops\Domain\Entities\Crop;
use Modules\Crops\Domain\Interfaces\ICropsRepository;
use Modules\Crops\Infrastructure\Persistence\CropEloquent;

class CropsRepository extends BaseRepository implements ICropsRepository
{
    public function __construct(CropEloquent $model)
    {
        parent::__construct($model, Crop::class);
    }
}