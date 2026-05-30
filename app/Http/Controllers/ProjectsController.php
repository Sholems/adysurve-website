<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::query()->with('service')->where('is_active', true)->latest()->paginate(9),
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'metaTitle' => 'Projects | ADYSURVE LTD',
            'metaDescription' => 'View ADYSURVE projects across IT infrastructure, CCTV surveillance, solar energy, training, and graphic design in Nigeria.',
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::query()->with('service')->where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('projects.show', [
            'project' => $project,
            'relatedProjects' => Project::query()->with('service')->where('service_id', $project->service_id)->where('id', '!=', $project->id)->take(3)->get(),
            'metaTitle' => $project->meta_title ?: $project->title,
            'metaDescription' => $project->meta_description ?: $project->description,
        ]);
    }
}
