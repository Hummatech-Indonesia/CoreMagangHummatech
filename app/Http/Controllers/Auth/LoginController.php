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
use App\Models\User;

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


    public function ApiLogin(Request $request)
    {
        $user = $this->user->get();

        $email = $request->input('email');
        $password = $request->input('password');

        // Cari pengguna berdasarkan email yang diberikan
        $loggedInUser = $user->firstWhere('email', $email);

        // Periksa apakah pengguna dengan email yang diberikan ditemukan dan password cocok
        if ($loggedInUser && password_verify($password, $loggedInUser->password)) {
            // Tugaskan peran (role) pengguna berdasarkan email atau jenis pengguna

            // Tampilkan data user
            $userData = [
                'id' => $loggedInUser->id,
                'name' => $loggedInUser->name,
                'email' => $email,
            ];

            // Buat respons JSON
            $response = [
                'status' => 'success',
                'message' => 'Login berhasil. Selamat datang!',
                'data' => $userData
            ];

            // Kembalikan respons JSON
            return Response::json($response);
        } else {
            // Jika email atau password tidak sesuai, kembalikan pesan error dalam respons JSON
            $response = [
                'status' => 'error',
                'message' => 'Login gagal. Email atau password salah.'
            ];

            // Kembalikan respons JSON
            return Response::json($response);
        }
    }
}
