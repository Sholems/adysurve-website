<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SiteSettingsSeeder::class,
            ServicesSeeder::class,
            DemoContentSeeder::class,
            BlogPostsSeeder::class,
        ]);
    }
}
