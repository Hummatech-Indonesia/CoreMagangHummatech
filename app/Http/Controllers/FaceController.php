<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FaceInterface;
use App\Http\Resources\FaceResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    private FaceInterface $face;
    public function __construct(FaceInterface $faceInterface)
    {
        $this->face = $faceInterface;
    }

    public function index(Request $request): JsonResponse
    {
        $serializedData = $this->face->get();
        $md5 = md5($serializedData);

        $response = [
            'result' => FaceResource::collection($serializedData)
        ];

        return response()->json($response);
    }
}
