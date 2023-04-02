<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('dashboards')->insert([
    			'nama' => $faker->name,
    			'umur' => $faker->numberBetween(25,40),
    			'nik' => $faker->numberBetween(11111,99999),
    			'alamat' => $faker->address
    		]);
 
    	}
    }
}
