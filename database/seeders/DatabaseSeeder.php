<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use Database\Seeders\Project\ProjectSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::truncate();
        $this->call([
            ProjectSeeder::class,
        ]);
    }
}
