<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pengguna::factory(15)->create();
        \App\Models\Barang::factory(50)->create();
        \App\Models\Transaksi::factory(75)->create();
    }
}
