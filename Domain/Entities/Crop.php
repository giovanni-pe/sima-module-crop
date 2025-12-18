<?php

namespace Modules\Crops\Domain\Entities;

use Modules\Core\Domain\BaseEntity;

class Crop extends BaseEntity
{
    public function __construct(
        public ?int $id,
        protected ?\Carbon\Carbon $created_at,
        protected ?\Carbon\Carbon $updated_at,
        public string $name,
        public ?string $variety,
        public ?string $scientific_name,
        public string $sowing_date,
        public ?string $estimated_harvest_date,
        public int $status,
        public ?string $notes,
    ) {}
}