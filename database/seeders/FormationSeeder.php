<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'intitule' => 'informatique',
        ]);
        DB::table('formations')->insert([
            'intitule' => 'SPI',
        ]);
        DB::table('formations')->insert([
            'intitule' => 'économie',
        ]);
    }
}
