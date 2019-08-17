<?php

$factory->define(App\SalaryGroup::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "maximum_leave_days" => $faker->randomNumber(2),
        "ot_rate" => $faker->randomNumber(2),
        "salary" => $faker->randomNumber(2),
    ];
});
