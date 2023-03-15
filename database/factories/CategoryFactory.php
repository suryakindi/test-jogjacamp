<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $randomnumber = rand(0,1);
    return [
        'name'=>$faker->name,
        'is_publish'=>$randomnumber,
    ];
});
