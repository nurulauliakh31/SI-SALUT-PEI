<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_users')->insert([
            'name' => 'pei',
            'email' => 'pei.ac.id@gmail.com',
            'password' => bcrypt('admin'),
            'foto_profil' => 'pei.png',
            'status' => 'aktif',
            'role' => 'admin',
        ]);
    }
}
