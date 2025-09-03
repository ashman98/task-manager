<?php

namespace Database\Seeders\Project;

use App\Models\Project\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Job',
            'description' => 'Job tasks'
        ]);

        Project::create([
            'name' => 'Daily',
            'description' => 'Daily tasks'
        ]);
    }
}
