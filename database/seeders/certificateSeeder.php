<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\certificate;

class certificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certificates')->delete();
        for ($i=1; $i < 10; $i++) {
            certificate::create([
                'name'=> 'cert_'.$i
            ]);
        }
    }
}
