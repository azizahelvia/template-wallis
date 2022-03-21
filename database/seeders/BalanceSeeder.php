<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            "user_id"       => 4,
            "balance"       => 0
        ]);
    }
}
