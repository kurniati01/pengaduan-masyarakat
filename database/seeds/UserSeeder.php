<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
    			'nik' => '12345',
    			'name' => 'user',
    			'email' => 'user@gmail.com',
    			'password' => bcrypt('12345'),
    			'level' => 'user',
    			'telp' => 910239,
    		]);
    		DB::table('users')->insert([
    			'nik' => '54321',
    			'name' => 'admin',
    			'email' => 'admin@gmail.com',
    			'password' => bcrypt('12345'),
    			'level' => 'admin',
    			'telp' => 910239,
    		]);
    		DB::table('users')->insert([
    			'nik' => '321412',
    			'name' => 'petugas',
    			'email' => 'petugas@gmail.com',
    			'password' => bcrypt('12345'),
    			'level' => 'petugas',
    			'telp' => 910239,
    		]);


    }
}
