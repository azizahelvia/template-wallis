<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'   => ['required', 'numeric']
        ]);

        $user = User::create([
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => Hash::make($request->password),
            "role_id"   => $request->role_id
        ]);

        if ($user->role_id === 4) {
            Balance::create([
                "user_id"   => $user->id,
                "balance"   => 0,
            ]);
        }

        return response()->json([
            "status"    => 200,
            "message"   => "Berhasil Menambahkan User dan Saldo",
            "data"      => $user
        ]);
    }

    public function login(Request $request)
    {
        $users = $request->validate([
            "email"     => "required|string",
            "password"  => "required|string"
        ]);

        $user = User::where('email', $users['email'])->first();

        if(!$user || !Hash::check($users['password'], $user->password)) {
            return response([
                "Message"   => "These credentials do not match our records"
            ], 401);
        }

        return response()->json([
            "status"    => 200,
            "message"   => "Berhasil Login!"
        ]);
    }
}
