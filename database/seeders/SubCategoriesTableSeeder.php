<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sub_categories')->get()->count() == 0){
            DB::table('sub_categories')->insert(
                array(
                    array('id' => '1','name' => 'Leafy Vegetables','category_id' => '2','status' => '1'),
                    array('id' => '2','name' => 'Juicy Fruits','category_id' => '1','status' => '1'),
                    array('id' => '3','name' => 'Seasonal Fruits','category_id' => '1','status' => '1'),
                    array('id' => '4','name' => ' Fleshy Fruits','category_id' => '1','status' => '1'),
                    array('id' => '5','name' => 'Seasonal Vegetables','category_id' => '2','status' => '1'),
                    array('id' => '6','name' => 'General Vegetables','category_id' => '2','status' => '1'),
                    array('id' => '7','name' => 'Fleshy Vegetables','category_id' => '2','status' => '1'),
                    array('id' => '8','name' => 'Salad Vegetables','category_id' => '2','status' => '1')
                )
            );
        } else { echo "Table is not empty, therefore NOT "; }
    }
}
