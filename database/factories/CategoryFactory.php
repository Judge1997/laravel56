<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $project_ids = App\Project::all()->pluck('id')->toArray();
    $assign_tos = App\User::all()->pluck('id')->toArray();
    return [
      'project_id' => $faker->randomElement($project_ids),
      'name' => $faker->word,
      'assign_to' => $faker->randomElement($assign_tos)
    ];
});
