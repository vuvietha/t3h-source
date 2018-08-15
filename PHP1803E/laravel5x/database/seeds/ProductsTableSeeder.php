<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =1 ; $i < 10; $i++){
        	DB::table('products')->insert([
        		'namepd' => 'namepd_'.$i,
        		'catid'  => $i,
        		'sizeid' => $i,
        		'imagepd' => 'anh',
        		'pricepd' => $i,
        		'statuspd' => 1,
        		'qtypd' => $i,
        		'despd' => 'des',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
