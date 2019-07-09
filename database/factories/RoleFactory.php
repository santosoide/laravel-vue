<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Domain\Entities\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'permission_type' => $faker->randomElement($array = array ('admin','user')),
    ];
});
