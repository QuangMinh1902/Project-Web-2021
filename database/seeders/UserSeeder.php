<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nom' => 'pham',
            'prenom' => 'thuytrang',
            'login' => 'trang',
            'mdp' => Hash::make('trang'),
            'formation_id'=> '1'

        ]);
        DB::table('users')->insert([
            'nom' => 'nguyen',
            'prenom' => 'vantung',
            'login' => 'tung',
            'mdp' => Hash::make('tung'),
        ]);
        DB::table('users')->insert([
            'nom' => 'pham',
            'prenom' => 'bathanh',
            'login' => 'thanh',
            'mdp' => Hash::make('thanh'),
            'formation_id'=> '2'
        ]);
        DB::table('users')->insert([
            'nom' => 'pham',
            'prenom' => 'quangtruong',
            'login' => 'truong',
            'mdp' => Hash::make('truong'),
        ]);
        DB::table('users')->insert([
            'nom' => 'tran',
            'prenom' => 'thuychi',
            'login' => 'chi',
            'mdp' => Hash::make('chi'),
        ]);
        DB::table('users')->insert([
            'nom' => 'vu',
            'prenom' => 'thanhthien',
            'login' => 'thien',
            'mdp' => Hash::make('thien'),
            'formation_id'=> '1'
        ]);
        DB::table('users')->insert([
            'nom' => 'hoang',
            'prenom' => 'hahoa',
            'login' => 'hoa',
            'mdp' => Hash::make('hoa'),
        ]);
        DB::table('users')->insert([
            'nom' => 'pham',
            'prenom' => 'vanduong',
            'login' => 'duong',
            'mdp' => Hash::make('duong'),
        ]);
        DB::table('users')->insert([
            'nom' => 'nguyen',
            'prenom' => 'khanhlinh',
            'login' => 'linh',
            'mdp' => Hash::make('minh'),
        ]);
        DB::table('users')->insert([
            'nom' => 'vu',
            'prenom' => 'trunghieu',
            'login' => 'hieu',
            'mdp' => Hash::make('hieu'),
            'formation_id'=> '1'
        ]);
        DB::table('users')->insert([
            'nom' => 'le',
            'prenom' => 'vanquy',
            'login' => 'quy',
            'mdp' => Hash::make('quy'),
        ]);
        DB::table('users')->insert([
            'nom' => 'hoang',
            'prenom' => 'thihuong',
            'login' => 'huong',
            'mdp' => Hash::make('huong'),
        ]);
        DB::table('users')->insert([
            'nom' => 'le',
            'prenom' => 'thimy',
            'login' => 'my',
            'mdp' => Hash::make('my'),
        ]);
        DB::table('users')->insert([
            'nom' => 'le',
            'prenom' => 'hoangvanthu',
            'login' => 'thu',
            'mdp' => Hash::make('thu'),
        ]);
        DB::table('users')->insert([
            'nom' => 'luong',
            'prenom' => 'vanbich',
            'login' => 'bich',
            'mdp' => Hash::make('bich'),
        ]);
        DB::table('users')->insert([
            'nom' => 'le',
            'prenom' => 'thiminhkhai',
            'login' => 'khai',
            'mdp' => Hash::make('khai'),
        ]);
        DB::table('users')->insert([
            'nom' => 'tran',
            'prenom' => 'van duc',
            'login' => 'duc',
            'mdp' => Hash::make('duc'),
            'formation_id'=> '2'
        ]);
        DB::table('users')->insert([
            'nom' => 'vu',
            'prenom' => 'vanthach',
            'login' => 'thach',
            'mdp' => Hash::make('thach'),
            'formation_id'=> '1'
        ]);
        DB::table('users')->insert([
            'nom' => 'luong',
            'prenom' => 'vanquang',
            'login' => 'quang',
            'mdp' => Hash::make('quang'),
            'formation_id'=> '2'
        ]);
        DB::table('users')->insert([
            'nom' => 'vu',
            'prenom' => 'tramanh',
            'login' => 'tramanh',
            'mdp' => Hash::make('tramanh'),
        ]);
    }
}
