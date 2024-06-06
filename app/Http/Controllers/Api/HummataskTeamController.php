<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\HummataskTeamRequest;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Http\Resources\HummataskTeamResource;
use App\Models\HummataskTeam;
use App\Services\HummataskTeamService;
use Illuminate\Http\JsonResponse;

class HummataskTeamController extends Controller
{
    private HummataskTeamInterface $hummataskTeam;
    private HummataskTeamService $service;
    public function __construct(HummataskTeamInterface $hummataskTeamInterface, HummataskTeamService $hummataskTeamService)
    {
        $this->service = $hummataskTeamService;
        $this->hummataskTeam = $hummataskTeamInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(HummataskTeamRequest $request): JsonResponse
    {
        $data = $this->service->storeApi($request);
        $this->hummataskTeam->store($data);
        return ResponseHelper::success(null, "Berhasil membuat tim");
    }

    /**
     * show
     *
     * @param  mixed $hummataskTeam
     * @return JsonResponse
     */
    public function show(HummataskTeam $hummataskTeam): JsonResponse
    {
        return ResponseHelper::success(HummataskTeamResource::make($hummataskTeam));
    }
}
