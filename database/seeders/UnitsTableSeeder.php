<?php
 namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('units')->get()->count() == 0){

            DB::table('units')->insert(
                array(
                    array('id' => '1','name' => 'Kilogram','sname' => 'kg','parent_id' => null,'divider' => '1','status' => '1'),
                    array('id' => '2','name' => 'Gram','sname' => 'gm','parent_id' => '1','divider' => '1000','status' => '1'),
                    array('id' => '3','name' => 'Dozen','sname' => 'dz','parent_id' => null,'divider' => '1','status' => '1'),
                    array('id' => '4','name' => 'Piece','sname' => 'pc','parent_id' => null,'divider' => '1','status' => '1'),
                    array('id' => '5','name' => 'Combo','sname' => 'combo','parent_id' => null,'divider' => '1','status' => '1')
                )
            );

        } else { echo "Table is not empty, therefore NOT "; }
    }
}
