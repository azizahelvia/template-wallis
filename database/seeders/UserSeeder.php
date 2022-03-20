<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin      = Role::create(["name"  => "Administrator"]);
        $banks      = Role::create(["name"  => "Bank Mini"]);
        $merchants  = Role::create(["name"  => "Kantin"]);
        $students   = Role::create(["name"  => "Siswa"]);

        User::create([
            "name"      => "Admin Master",
            "email"     => "admin@gmail.com",
            "password"  => Hash::make("password123"),
            "role_id"   => $admin->id
        ]);
        User::create([
            "name"      => "Barbara Gibbons",
            "email"     => "barbaragibbons@gmail.com",
            "password"  => Hash::make("password123"),
            "role_id"   => $banks->id
        ]);
        User::create([
            "name"      => "Gabriel Herington",
            "email"     => "gabrielherington@gmail.com",
            "password"  => Hash::make("password123"),
            "role_id"   => $merchants->id
        ]);
        User::create([
            "name"      => "Azizah Elvia",
            "email"     => "azizahelvia@gmail.com",
            "password"  => Hash::make("password123"),
            "role_id"   => $students->id
        ]);
    }
}
