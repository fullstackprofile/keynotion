<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->delete();
        $users = array(
            array('id' => 1,'first_name' => 'admin ' ,'last_name' => "admin",'email'=>"admin@example.com",'country'=>"No country",'password'=>Hash::make('123123123'),'role'=>'admin'),
            array('id' => 2,'first_name' => 'admin ' ,'last_name' => "admin",'email'=>"agenda@key-notion.com",'country'=>"No country",'password'=>Hash::make('123123123'),'role'=>'user'),
            array('id' => 3,'first_name' => 'admin ' ,'last_name' => "admin",'email'=>"sponsorship@key-notion.com",'country'=>"No country",'password'=>Hash::make('123123123'),'role'=>'user'),
            array('id' => 4,'first_name' => 'admin ' ,'last_name' => "admin",'email'=>"info@key-notion.com",'country'=>"No country",'password'=>Hash::make('123123123'),'role'=>'user'),
        );
        DB::table('users')->insert($users);
    }
}
