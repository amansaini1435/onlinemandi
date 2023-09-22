<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        if (User::get()->count() == 0) {
            User::create(array('name' => 'Administrator', 'email' => 'admin@topntech.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('root1234'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()));     
        } else {
            echo "Table is not empty";
        }
    }
}
