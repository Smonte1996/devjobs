<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //se llama al seeder para integre la informacion en la base
        $this->call( SalarioSeeder::class);
        $this->call(CategoriasSeeder::class);
    }
}
