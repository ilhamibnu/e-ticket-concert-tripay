<?php


namespace Database\Seeders;
use \App\Models\Paket;
use \App\Models\Pendaftaran;

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

         Paket::create([
            'name' => 'Paket 1',
            'harga' => 100000,
            'jumlah' => 500,
         ]);

            Paket::create([
                'name' => 'Paket 2',
                'harga' => 200000,
                'jumlah' => 500,
            ]);

            Pendaftaran::create([
                'id_paket' => 1,
                'name' => 'Ilham Ibnu Ahmad',
                'email' => 'ilhamibnuahmad@gmail.com',
                'phone' => '081231897839',
                'tiket' => 'tiket1.png',
                'qris' => 'qris1.png',
                'status' => 'paid',
            ]);

            Pendaftaran::create([
                'id_paket' => 2,
                'name' => 'Sugeng Riyadi',
                'email' => 'sugengriyadi@gmail.com',
                'phone' => '085607743539',
                'tiket' => 'tiket2.png',
                'qris' => 'qris2.png',
                'status' => 'pending',
            ]);
    }
}
