<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\UserInterface;
use App\Enum\RolesEnum as EnumRolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Enums\RolesEnum;
use App\Helpers\ResponseHelper;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    private UserInterface $user;
    public function __construct(UserInterface $user)
    {
        $this->middleware('guest')->except('logout');
        $this->user = $user;
    }

    public function ApiLogin(Request $request): JsonResponse
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = [
                'token' => $token,
                'user' => UserResource::make($user)
            ];
            return ResponseHelper::success($data, "Berhasil login");
        } else {
            return ResponseHelper::error(null, "Username / password salah");
        }
    }

}
