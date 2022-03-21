<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.data_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect()->back()->with("status", "Berhasil Menambahkan User!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password === null) {
            User::find($id)->update([
                "name"      => $request->name,
                "email"     => $request->email,
                "role_id"   => $request->role_id
            ]);

            return redirect()->back()->with("status", "Berhasil Mengedit User!");
        }

        User::find($id)->update([
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => Hash::make($request->password),
            "role_id"   => $request->role_id
        ]);

        return redirect()->back()->with("status", "Berhasil Mengedit User!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Balance::where("user_id", $user->id)->delete();

        $user->delete();

        return redirect()->back()->with("status", "Berhasil Menghapus User!");
    }
}
