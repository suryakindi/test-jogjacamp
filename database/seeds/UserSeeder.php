<?php

use Illuminate\Database\Seeder;
Use App\Model;
Use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(User::class, 2)->create();
    }
}
