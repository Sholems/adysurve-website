<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'featuredProjects' => Project::query()->with('service')->where('is_active', true)->where('is_featured', true)->latest()->take(3)->get(),
            'latestPosts' => BlogPost::query()->published()->latest('published_at')->latest()->take(3)->get(),
            'testimonials' => Testimonial::query()->where('is_active', true)->latest()->take(6)->get(),
            'settings' => fn (string $key, ?string $default = null) => SiteSetting::getValue($key, $default),
            'metaTitle' => 'ADYSURVE LTD | IT, Security, CCTV, Solar & Media Solutions',
            'metaDescription' => 'ADYSURVE LTD delivers IT infrastructure, CCTV surveillance, solar energy, IT training, and graphic design solutions in Nigeria.',
        ]);
    }
}
