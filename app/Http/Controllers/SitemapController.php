<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = Cache::remember('sitemap_xml', 3600, function () {
            $sitemap = Sitemap::create()
                ->add(Url::create('/'))
                ->add(Url::create('/about'))
                ->add(Url::create('/services'))
                ->add(Url::create('/projects'))
                ->add(Url::create('/blog'))
                ->add(Url::create('/megabyte-academy/network-security-training'))
                ->add(Url::create('/megabyte-academy/cctv-installation-surveillance-security-training'))
                ->add(Url::create('/megabyte-academy/solar-renewable-energy-design-installation-training'))
                ->add(Url::create('/megabyte-academy/it-essentials-for-beginners-training'))
                ->add(Url::create('/megabyte-academy/graphic-design-media-communication-training'))
                ->add(Url::create('/contact'))
                ->add(Url::create('/privacy-policy'))
                ->add(Url::create('/terms'));

            Service::query()->where('is_active', true)->each(fn (Service $service) => $sitemap->add(Url::create(route('services.show', $service->slug, false))));
            Project::query()->where('is_active', true)->each(fn (Project $project) => $sitemap->add(Url::create(route('projects.show', $project->slug, false))));
            BlogPost::query()->published()->each(fn (BlogPost $post) => $sitemap->add(Url::create(route('blog.show', $post->slug, false))));

            return $sitemap->render();
        });

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
