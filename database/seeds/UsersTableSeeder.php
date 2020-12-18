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
        //
        DB::table('users')->insert([
            'name' => 'アグディッシュ太郎',
            'email' => 'ag@ag.jp',
            'password' => bcrypt('aaaa'),
            'tell' => '08012345678',
        ]);
    }
}
