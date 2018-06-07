<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    $project_ids = App\Project::all()->pluck('id')->toArray();
    $category_ids = App\Category::all()->pluck('id')->toArray();
    $assign_tos = App\User::all()->pluck('id')->toArray();
    return [
      'project_id' => $faker->randomElement($project_ids),
      'category_id' => $faker->randomElement($category_ids),
      'summary' => $faker->text,
      'status' => $faker->randomElement([
        'new','feedback','acknowledged','confirmed','resolved','closed'
      ]),
      'reporter' => $faker->randomElement($assign_tos),
      'assigned_to' => $faker->randomElement($assign_tos),
      'priority' => $faker->randomElement([
        'none','low','normal','high','urgent','immediate'
      ]),
      'severity' => $faker->randomElement([
        'feature','trivial','text','minor','major','crash','block'
      ]),
      'reproducibility' => $faker->randomElement([
        'always','sometimes','random','have not tried','unable to reproduce','N/A'
      ]),
      'description' => $faker->text,
      'steps' => $faker->text
    ];
});
