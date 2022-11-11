<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\language;
class languageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        $langs = ['China','Spain','Japan','Pakistan','Arabic','India','Viet Nam','France','Germany'];
        foreach ($langs as $lang) {
            language::create([
                'name'=>$lang
            ]);
        }
    }
}
