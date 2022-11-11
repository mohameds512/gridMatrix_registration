<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\country;
use App\Models\city;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $countries = country::get();
        foreach ($countries as $country) {
            for ($i=1; $i < 10; $i++) {
                city::create([
                    'name' => $country->name.'_city_'.$i,
                    'country_id' => $country->id,
                ]);
            }
        }

    }
}
