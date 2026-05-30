<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index', [
            'teamMembers' => TeamMember::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'metaTitle' => 'About ADYSURVE LTD | Technology, Engineering, Security & Solar Solutions',
            'metaDescription' => 'ADYSURVE LTD provides IT infrastructure, networking, CCTV surveillance, solar energy, IT training, graphic design, and media communication solutions.',
        ]);
    }
}
