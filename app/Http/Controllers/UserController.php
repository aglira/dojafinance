<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $data = [
            'user' => User::all()
        ];

        return view('dashboard.index', $data);
    }

    public function check(Request $request)
    {
        // dd($request);
        $akun = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
        );
        if (Auth::attempt($akun)) {
            $request->session()->regenerate();
            return redirect()->to('dashboard');
            if (Auth::user()->role == 'admin') :
                return redirect()->to('/dashboard');
            else :
                return redirect()->to('/dashboard');
            endif;
        }
    }
    //Untuk Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->to('/dashboard/user')->with('success', 'User successfully created');
    }

    public function update(int $id, UserUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = User::query()->find($id);

        $user->fill($data);
        $user->save();

        return redirect()->to('/dashboard/user')->with('success', 'Update success');
    }

    public function delete(int $id): JsonResponse
    {
        $user = User::query()->find($id)->delete();

        if($user):
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data user berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}
