<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        return view('services.index', [
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'metaTitle' => 'Services | ADYSURVE LTD',
            'metaDescription' => 'Explore ADYSURVE services across networks, security, CCTV surveillance, solar renewable energy, IT training, and media communication.',
        ]);
    }

    public function show(string $slug)
    {
        $service = Service::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('services.show', [
            'service' => $service,
            'relatedProjects' => $service->projects()->where('is_active', true)->latest()->take(3)->get(),
            'relatedServices' => Service::query()
                ->where('is_active', true)
                ->where('id', '!=', $service->id)
                ->where('slug', '!=', 'it-training')
                ->orderBy('sort_order')
                ->take(3)
                ->get(),
            'metaTitle' => $service->meta_title ?: $service->title,
            'metaDescription' => $service->meta_description ?: $service->short_description,
        ]);
    }
}
