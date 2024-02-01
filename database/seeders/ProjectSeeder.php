<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_project = config("projects");

        foreach ($array_project as $project_item) {
            $array_project = new Project();
            $array_project->title = $project_item["title"];
            $array_project->description = $project_item["description"];
            $array_project->image = $project_item["image"];
            $array_project->topic = $project_item["topic"];

            $array_project->save();
        }
    }
}
