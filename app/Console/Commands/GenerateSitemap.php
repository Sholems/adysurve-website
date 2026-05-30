<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate public/sitemap.xml for ADYSURVE LTD.';

    public function handle(): int
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about'))
            ->add(Url::create('/services'))
            ->add(Url::create('/projects'))
            ->add(Url::create('/contact'))
            ->add(Url::create('/privacy-policy'))
            ->add(Url::create('/terms'));

        Service::query()->where('is_active', true)->each(fn (Service $service) => $sitemap->add(Url::create("/services/{$service->slug}")));
        Project::query()->where('is_active', true)->each(fn (Project $project) => $sitemap->add(Url::create("/projects/{$project->slug}")));

        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap generated at public/sitemap.xml');

        return self::SUCCESS;
    }
}
