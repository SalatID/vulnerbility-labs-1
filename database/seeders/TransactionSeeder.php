<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [];

        for ($i = 0; $i < 15; $i++) {
            $transactions[] = [
                'user_id' => 1,
                'amount' => rand(100, 10000) / 100,
                'qty' => rand(1, 10),
                'description' => 'Transaction for user 1 - ' . ($i + 1),
                'transaction_date' => now()->subDays(rand(0, 30))->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        for ($i = 0; $i < 15; $i++) {
            $transactions[] = [
            'user_id' => 2,
            'amount' => rand(100, 10000) / 100,
            'qty' => rand(1, 10),
            'description' => 'Transaction for user 2 - ' . ($i + 1),
            'transaction_date' => now()->subDays(rand(0, 30))->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }

        \DB::table('transactions')->insert($transactions);
    }
}
