<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('categories')->get()->count() == 0){

            DB::table('categories')->insert(
                array(
                    array('id' => '1','name' => 'Fruits','status' => '1'),
                    array('id' => '2','name' => 'Vegetables','status' => '1'),
                    array('id' => '3','name' => 'Milk Products','status' => '0'),
                    array('id' => '4','name' => 'Dry Fruits','status' => '0'),
                    array('id' => '5','name' => 'Cereals','status' => '0')
                )
            );

        } else { echo "Table is not empty, therefore NOT "; }
    }
}
