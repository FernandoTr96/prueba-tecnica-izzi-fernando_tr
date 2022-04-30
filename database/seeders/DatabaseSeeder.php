<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitProfiles::class);
        $this->call(InitSubsidiaries::class);
        $this->call(InitCategories::class);
        $this->call(InitUsers::class);
    }
}
