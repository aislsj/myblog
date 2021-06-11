<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            ['nickname' => '提米', 'username' => 'admin','password' => bcrypt('123456'),'status' => '1'],
        ]);
    }
}
