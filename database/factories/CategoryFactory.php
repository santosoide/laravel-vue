<?php

use App\Domain\Entities\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Domain\Entities\Category::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'position' => $faker->numberBetween(2),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'status' => $faker->numberBetween(2),
        '_lft' => $faker->uuid,
        '_rgt' => $faker->uuid,
        'parent_id' => $faker ->uuid,
        'display_mode' => $faker ->name,
    ];
});
