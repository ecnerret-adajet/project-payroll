<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('positions')->insert([
          array('name'=>'Placket' ),
          array('name'=>'Collar' ),
          array('name'=>'Edging' ),
          array('name'=>'Slit' ),
          array('name'=>'Piping Buttons' ),
          array('name'=>'Piping Shoulder' ),
          array('name'=>'Button sew' ),
          array('name'=>'Trimmer' ),
          array('name'=>'Reviser' ),
          array('name'=>'Clothing packer' ),
          array('name'=>'Driver' )
        ]);
    }
}
