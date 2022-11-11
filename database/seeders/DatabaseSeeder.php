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
        $this->call(countrySeeder::class);
        $this->call(citySeeder::class);
        $this->call(languageSeeder::class);
        $this->call(CertificateSeeder::class);

    }
}
