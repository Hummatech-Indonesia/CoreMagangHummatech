<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $user;
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->get();    
        return ResponseHelper::success(UserResource::collection($users));
    }
}
