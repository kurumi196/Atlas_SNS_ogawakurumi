<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        ['username' => '001',
         'mail' => '001@com',
         'password' => bcrypt('001')]
        ]);
    }
}
