<?php

namespace Modules\Crops\Http\DTOs;

use Modules\Crops\Domain\Entities\Crop;
use Modules\Crops\Http\Requests\CreateCropRequest;
use Modules\Crops\Http\Requests\UpdateCropRequest;

final class CropDTO
{
    public function __construct(
            public string $name,
            public ?string $variety,
            public ?string $scientific_name,
            public string $sowing_date,
            public ?string $estimated_harvest_date,
            public int $status,
            public ?string $notes,
    ) {}

    public static function fromCreateRequest(CreateCropRequest $r): self
    {
        $v = $r->validated();
        return new self(
            name: ($v['name'] ?? ''),
            variety: ($v['variety'] ?? null),
            scientific_name: ($v['scientific_name'] ?? null),
            sowing_date: ($v['sowing_date'] ?? ''),
            estimated_harvest_date: ($v['estimated_harvest_date'] ?? null),
            status: isset($v['status']) ? (int)$v['status'] : 0,
            notes: ($v['notes'] ?? null),
        );
    }

    public static function fromUpdateRequest(UpdateCropRequest $r): self
    {
        $v = $r->validated();
        return new self(
            name: ($v['name'] ?? ''),
            variety: ($v['variety'] ?? null),
            scientific_name: ($v['scientific_name'] ?? null),
            sowing_date: ($v['sowing_date'] ?? ''),
            estimated_harvest_date: ($v['estimated_harvest_date'] ?? null),
            status: isset($v['status']) ? (int)$v['status'] : 0,
            notes: ($v['notes'] ?? null),
        );
    }

    public function toEntity(?int $id = null): Crop
    {
        return new Crop(
            id: $id,
            name: $this->name,
            variety: $this->variety,
            scientific_name: $this->scientific_name,
            sowing_date: $this->sowing_date,
            estimated_harvest_date: $this->estimated_harvest_date,
            status: $this->status,
            notes: $this->notes,

            created_at: null,
            updated_at: null,
        );
    }
}