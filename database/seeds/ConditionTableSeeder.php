<?php

use Illuminate\Database\Seeder;

class ConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('conditions')->insert([
          array('name'=>'Active'),
          array('name'=>'Maternity Leave'),
          array('name'=>'Paternal Leave'),
          array('name'=>'Leave with pay'),
          array('name'=>'Leave wihtout pay'),
          array('name'=>'Suspended'),
          array('name'=>'Terminated')
        ]);
    }
}
