<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('consultation', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        View::composer([
            'components.layout.header',
            'components.layout.footer',
            'components.ui.social-links',
        ], function ($view) {
            static $sharedData = null;

            if ($sharedData === null) {
                $allServices = Service::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();

                $academyPrograms = collect(config('adysurve.academy_programs', []))
                    ->map(fn (array $program) => [
                        ...$program,
                        'url' => route($program['route']),
                    ])
                    ->all();

                $sharedData = [
                    'layoutServices' => $allServices,
                    'layoutMenuServices' => $allServices
                        ->reject(fn (Service $service) => $service->slug === 'it-training' || str_contains($service->title, 'IT Essentials'))
                        ->values(),
                    'serviceIcons' => config('adysurve.service_icons', []),
                    'academyPrograms' => $academyPrograms,
                    'siteSettings' => SiteSetting::allCached(),
                ];
            }

            $view->with($sharedData);
        });
    }
}
