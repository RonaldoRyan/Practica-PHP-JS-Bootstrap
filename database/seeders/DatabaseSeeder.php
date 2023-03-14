<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\ProductoFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    //   User::factory(10)->create();

        $this->call([
            ClienteSeeder::class,
            ProductoSeeder::class,
            OrdenDetallesSeeder::class
        ]);
    }
}


