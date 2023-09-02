<?php


namespace Database\Seeders;

use \App\Models\Paket;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //  Paket::create([
        //     'name' => 'Paket 1',
        //     'harga' => 100000,
        //     'jumlah' => 500,
        //     'status' => 'aktif',
        //  ]);

        //     Paket::create([
        //         'name' => 'Paket 2',
        //         'harga' => 200000,
        //         'jumlah' => 500,
        //         'status' => 'aktif',
        //     ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
