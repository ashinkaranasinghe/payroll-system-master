<?php

$factory->define(App\EmployeeFund::class, function (Faker\Generator $faker) {
    return [
        "fund_name" => $faker->name,
        "employee_percentage" => $faker->randomFloat(2, 1, 100),
        "employer_percentage" => $faker->randomFloat(2, 1, 100),
    ];
});
