<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

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

    /**
     * ApiLogin
     *
     * @param  mixed $request
     * @return JsonResponse
     */
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
