<?php

use App\Channel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'code' => $faker->countryCode,
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 200),
        'timezone' => $faker->timezone,
        'theme' => $faker->name,
        'hostname' => $faker->name,
        'logo' => $faker->name,
        'favicon' => $faker->name,
        'home_page_content' => $faker->text,
        'footer_content' => $faker->text,
        'default_locale_id' => $faker->uuid,
        'base_currency_id' => $faker->uuid,
        'root_category_id' => $faker->uuid,

    ];
});
