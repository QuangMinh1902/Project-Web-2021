<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plannings')->insert([
            'cours_id' => '1',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-05-12 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '2',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-06-12 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '3',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-07-16 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '1',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-06-22 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '6',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-012-21 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '7',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-10-01 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '8',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-11-02 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '11',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-12-25 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '9',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-12-11 07:12:54"),
        ]);
        DB::table('plannings')->insert([
            'cours_id' => '10',
            'date_debut' => date("Y-m-d h:i:s"),
            'date_fin' => date("2021-7-21 07:12:54"),
        ]);
    }
}
