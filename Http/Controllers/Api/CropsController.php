<?php

namespace Modules\Crops\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Core\Http\BaseController;
use Modules\Crops\Application\Contracts\ICropsService;
use Modules\Crops\Http\DTOs\CropDTO;
use Modules\Crops\Http\Requests\CreateCropRequest;
use Modules\Crops\Http\Requests\UpdateCropRequest;

class CropsController extends BaseController
{
    public function __construct(private readonly ICropsService $service) {}

    public function index(Request $request)
    {
        return $this->paginated($this->service->paginate(
            perPage: $request->integer('per_page', 15),
            filters: $request->all()
        ));
    }

    public function store(CreateCropRequest $request)
    {
        return $this->success(
            $this->service->save(CropDTO::fromCreateRequest($request)->toEntity()),
            'Created', 201
        );
    }

    public function show(int $id)
    {
        return $this->success($this->service->find($id));
    }

    public function update(UpdateCropRequest $request, int $id)
    {
        return $this->success(
            $this->service->save(CropDTO::fromUpdateRequest($request)->toEntity($id)),
            'Updated'
        );
    }

    public function destroy(int $id)
    {
        return $this->success($this->service->delete($id), 'Deleted');
    }

    public function active()
    {
        return $this->success($this->service->active());
    }
}