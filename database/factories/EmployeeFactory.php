<?php

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "birthday" => $faker->date("Y-m-d", $max = 'now'),
        "contact__no" => $faker->name,
        "employee_no" => $faker->name,
        "epf_no" => $faker->name,
        "salary_group_id" => factory('App\SalaryGroup')->create(),
    ];
});
