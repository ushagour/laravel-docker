<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Role_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::findOrFail(1)->roles()->sync(1);

    }
}
