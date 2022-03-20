<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isi Saldo
        Transaction::create([
            "user_id"       => 4,
            "inventory_id"  => null,
            "amount"        => 25000,
            "invoice_id"    => "BAL_4849910",
            "type"          => 1,
            "status"        => 4
        ]);

        Transaction::create([
            "user_id"       => 4,
            "inventory_id"  => null,
            "amount"        => 35000,
            "invoice_id"    => "BAL_4749302",
            "type"          => 1,
            "status"        => 4
        ]);
    }
}
