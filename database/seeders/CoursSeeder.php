<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cours')->insert([
            'intitule' => 'math',
            'user_id' => '4',
            'formation_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'giao duc cong dan',
            'user_id' => '4',
            'formation_id' => '2',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'littérature',
            'user_id' => '9',
            'formation_id' => '3',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'physique',
            'user_id' => '10',
            'formation_id' => '1',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'giao duc quoc phong',
            'user_id' => '11',
            'formation_id' => '2',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'chimie',
            'user_id' => '16',
            'formation_id' => '3',
            'created_at'=> date("Y-m-d H:,i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'électronique',
            'user_id' => '22',
            'formation_id' => '2',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'automates',
            'user_id' => '11',
            'formation_id' => '3',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'web',
            'user_id' => '22',
            'formation_id' => '3',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'java',
            'user_id' => '6',
            'formation_id' => '2',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
        DB::table('cours')->insert([
            'intitule' => 'anglais',
            'user_id' => '9',
            'formation_id' => '1',
            'created_at'=> date("Y-m-d H:i:s")
        ]);
    }
}
