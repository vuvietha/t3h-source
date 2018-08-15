<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10 ; $i++){
        	DB::table('categories')->insert([
        		'namecat' => 'cat_'.$i,
        		'parentid' => 0,
        		'description' => 'abc',
        		'status' => 1,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
