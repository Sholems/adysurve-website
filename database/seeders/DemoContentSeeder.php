<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DemoContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::query()->pluck('id', 'slug');
        $projects = [
            ['Office Network Upgrade', 'office-network-upgrade', 'networks-security', 'Lagos', true, 21],
            ['Estate CCTV Coverage', 'estate-cctv-coverage', 'cctv-surveillance', 'Abuja', true, 22],
            ['SME Solar Backup System', 'sme-solar-backup-system', 'solar-energy', 'Port Harcourt', true, 23],
            ['Digital Skills Bootcamp', 'digital-skills-bootcamp', 'it-training', 'Nigeria', false, 24],
            ['Brand Launch Media Kit', 'brand-launch-media-kit', 'graphic-design-media', 'Nigeria', false, 25],
        ];

        foreach ($projects as [$title, $slug, $serviceSlug, $location, $featured, $imageSeed]) {
            Project::updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'service_id' => $services[$serviceSlug],
                'client_name' => 'Confidential Client',
                'location' => $location,
                'featured_image' => "https://picsum.photos/900/650?random={$imageSeed}",
                'gallery_images' => [],
                'description' => 'A focused ADYSURVE implementation covering assessment, planning, deployment, testing, and after-service support.',
                'meta_title' => $title.' | ADYSURVE Project',
                'meta_description' => 'Explore this ADYSURVE project covering practical technology, security, energy, training, or media implementation in Nigeria.',
                'is_featured' => $featured,
                'is_active' => true,
            ]);
        }

        foreach ([
            ['Mrs. Ada Johnson', 'Operations Lead', 'Prime Schools', 'ADYSURVE handled our installation professionally and explained every part of the system clearly.'],
            ['Mr. Chinedu Okeke', 'Business Owner', 'Retail Hub', 'Their response time and support culture made the whole project feel organized from start to finish.'],
            ['Engr. Fatima Bello', 'Facilities Manager', 'Secure Estates', 'The team delivered a neat, reliable setup and remained available after commissioning.'],
        ] as [$name, $title, $company, $content]) {
            Testimonial::updateOrCreate(['client_name' => $name], [
                'client_title' => $title,
                'client_company' => $company,
                'content' => $content,
                'rating' => 5,
                'is_active' => true,
            ]);
        }

        foreach ([
            ['Adysurve Technical Team', 'Infrastructure & Security Specialists'],
            ['Adysurve Energy Team', 'Solar Design & Installation Specialists'],
            ['Adysurve Media Team', 'Creative Communication Specialists'],
        ] as $index => [$name, $role]) {
            TeamMember::updateOrCreate(['name' => $name], [
                'role' => $role,
                'bio' => 'A disciplined professional team focused on reliable delivery, practical advice, and long-term client support.',
                'photo' => 'https://picsum.photos/500/500?random='.(31 + $index),
                'social_links' => [],
                'is_active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
