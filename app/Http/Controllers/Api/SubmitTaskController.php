<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\SubmitTaskInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitTaskRequest;
use App\Models\CourseAssignment;
use App\Services\SubmitTaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubmitTaskController extends Controller
{
    private SubmitTaskInterface $submitTask;
    private SubmitTaskService $service;
    public function __construct(SubmitTaskInterface $submitTaskInterface, SubmitTaskService $submitTaskService)
    {
        $this->service = $submitTaskService;
        $this->submitTask = $submitTaskInterface;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $courseAssignment
     * @return JsonResponse
     */
    public function store(SubmitTaskRequest $request, CourseAssignment $courseAssignment): JsonResponse
    {
        $data = $this->service->store($request, $courseAssignment);
        $this->submitTask->store($data);
        return ResponseHelper::success(null, trans('alert.add_success'));
    }
}
