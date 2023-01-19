<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $project = new Project();
            $project->title = $faker->text(100);
            $project->slug = Str::slug($project->title, "-");
            $project->cover_image = 'placeholders/download.jpg'; // . $faker->image('storage/app/public/placeholders', 600, 300, 'Post', false, false);
            $project->author = $faker->name();
            $project->deadline = $faker->date();
            $project->save();
        }
    }
}
