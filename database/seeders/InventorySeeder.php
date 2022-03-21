<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::create([
            "name"      => "Nasi Goreng",
            "price"     => 10000,
            "stock"     => 30,
            "desc"      => "Nasi goreng dengan sosis dan potongan telur"
        ]);
    }
}
