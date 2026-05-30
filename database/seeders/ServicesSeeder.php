<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['Networks & Security', 'networks-security', 'heroicon-o-shield-check', 'https://picsum.photos/800/600?random=11', 'Reliable network infrastructure, cybersecurity hardening, and responsive IT support for growing organizations. ADYSURVE keeps teams connected, protected, and productive.', '<p>Modern businesses need networks that are fast, resilient, and secure. ADYSURVE designs and supports structured networks that keep offices, schools, homes, and enterprises confidently connected.</p><p>Our work covers LAN/WAN setup, router and firewall configuration, access control, wireless coverage planning, system troubleshooting, and preventive maintenance.</p><p>We help clients reduce downtime, improve data protection, and create a clear support process for everyday technical issues.</p><p>This service is ideal for businesses, institutions, estates, shops, and teams that depend on stable internet, secure internal systems, and quick technical response.</p>', 'Networks & Security Services in Nigeria', 'Professional network setup, IT support, firewall configuration, and security infrastructure services for businesses and institutions in Nigeria.'],
            ['CCTV Installation & Surveillance', 'cctv-surveillance', 'heroicon-o-video-camera', 'https://picsum.photos/800/600?random=12', 'Professional CCTV design, installation, monitoring setup, and maintenance for homes and businesses. We build surveillance systems that are clear, dependable, and easy to manage.', '<p>Security starts with visibility. ADYSURVE plans and installs CCTV systems that help clients monitor premises, deter incidents, and review events with confidence.</p><p>We handle camera placement, DVR/NVR setup, remote viewing, cabling, storage planning, and ongoing support.</p><p>Our installations are designed around coverage, clarity, lighting conditions, and practical daily use rather than one-size-fits-all equipment lists.</p><p>This service is suited for homes, offices, warehouses, schools, estates, retail outlets, churches, and event spaces.</p>', 'CCTV Installation and Surveillance in Nigeria', 'Get CCTV camera installation, remote monitoring setup, surveillance design, and maintenance for homes and businesses across Nigeria.'],
            ['Solar Renewable Energy', 'solar-energy', 'heroicon-o-sun', 'https://picsum.photos/800/600?random=13', 'Smart solar energy design and installation for reliable power backup and lower energy costs. ADYSURVE helps clients move toward cleaner, more dependable power.', '<p>Power reliability is a business advantage. ADYSURVE designs solar systems that match real usage patterns, site conditions, and budget priorities.</p><p>Our team supports solar audits, inverter and battery sizing, panel layout, installation, protection systems, and maintenance guidance.</p><p>We focus on practical energy independence: stable backup, reduced generator dependence, and systems that can be maintained over time.</p><p>This service supports homes, offices, schools, shops, health facilities, and organizations that need consistent power for essential operations.</p>', 'Solar Energy Design and Installation in Nigeria', 'Solar power system design, inverter installation, battery backup, and renewable energy solutions for homes and businesses in Nigeria.'],
            ['IT Essentials Training', 'it-training', 'heroicon-o-academic-cap', 'https://picsum.photos/800/600?random=14', 'Beginner-friendly IT training that builds practical digital confidence. Learners gain the foundation needed for office productivity, support roles, and further technology growth.', '<p>Technology skills open doors. ADYSURVE provides practical IT essentials training for beginners who want useful, job-ready digital competence.</p><p>Training can cover computer fundamentals, operating systems, internet use, productivity tools, basic networking concepts, safe digital practices, and troubleshooting habits.</p><p>Our approach is hands-on, patient, and focused on skills learners can immediately apply at work, school, or business.</p><p>This program is ideal for students, job seekers, business owners, office staff, and anyone beginning their technology journey.</p>', 'IT Essentials Training for Beginners in Nigeria', 'Practical beginner IT training in computer basics, office productivity, internet skills, networking foundations, and digital confidence.'],
            ['Graphic Design & Media', 'graphic-design-media', 'heroicon-o-paint-brush', 'https://picsum.photos/800/600?random=15', 'Brand-focused graphic design and media communication for businesses that need clear visual presence. We create designs that communicate trust, clarity, and momentum.', '<p>Strong visuals help organizations explain who they are and why they matter. ADYSURVE creates design assets that support marketing, communication, and brand recognition.</p><p>Our work includes social media graphics, flyers, business profiles, brand materials, presentation visuals, and campaign assets.</p><p>We balance creativity with clarity so every design supports a real communication goal and fits the client’s audience.</p><p>This service is built for startups, SMEs, schools, churches, events, professionals, and organizations that need polished visual communication.</p>', 'Graphic Design and Media Communication in Nigeria', 'Professional graphic design, brand visuals, social media graphics, flyers, and media communication services for Nigerian businesses.'],
        ];

        foreach ($services as $index => [$title, $slug, $icon, $image, $short, $full, $metaTitle, $metaDescription]) {
            Service::updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'icon' => $icon,
                'featured_image' => $image,
                'short_description' => $short,
                'full_description' => $full,
                'meta_title' => $metaTitle,
                'meta_description' => $metaDescription,
                'is_active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
