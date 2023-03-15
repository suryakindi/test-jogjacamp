<?php

use Illuminate\Database\Seeder;
Use Faker\Factory as Faker;
use App\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
    ]);
    }
}
