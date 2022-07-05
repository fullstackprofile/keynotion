<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendessSeeder extends Seeder
{

    public function run()
    {
        DB::table('attenders')->delete();
        $attenders = array(
            array('id' => 1,'title' => 'Supply Chain' ,'slug' => "Supply Chain"),
            array('id' => 2,'title' => 'Procurement' ,'slug' => "Procurement"),
            array('id' => 3,'title' => 'Planing' ,'slug' => "Planing"),
            array('id' => 4,'title' => 'Forecasting' ,'slug' => "Forecasting"),
            array('id' => 5,'title' => 'Logistic' ,'slug' => "Logistic"),
            array('id' => 6,'title' => 'Operations' ,'slug' => "Operations"),
            array('id' => 7,'title' => 'Distribution' ,'slug' => "Distribution"),
            array('id' => 8,'title' => 'Warehousing' ,'slug' => "Warehousing"),
            array('id' => 9,'title' => 'Production' ,'slug' => "Production"),
            array('id' => 10,'title' => 'Digital Innovation' ,'slug' => "Digital Innovation"),
            array('id' => 11,'title' => 'Information Technology' ,'slug' => "Information Technology"),
            array('id' => 12,'title' => 'Risk Menegement' ,'slug' => "Risk Menegement"),
            array('id' => 13,'title' => 'Inventory' ,'slug' => "Inventory"),
            array('id' => 14,'title' => 'Automation' ,'slug' => "Automation"),
            array('id' => 15,'title' => 'Artificial Intelligent' ,'slug' => "Artificial Intelligent"),
        );
        DB::table('attenders')->insert($attenders);
    }

}
