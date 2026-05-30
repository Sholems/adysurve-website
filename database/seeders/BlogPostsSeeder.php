<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            [
                'title' => 'How Smart CCTV Systems Improve Business Security',
                'slug' => 'how-smart-cctv-systems-improve-business-security',
                'category' => 'CCTV Security',
                'featured_image' => 'https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?auto=format&fit=crop&w=1200&q=85',
                'excerpt' => 'A practical look at how modern CCTV, remote monitoring, storage, and maintenance help organizations protect people and assets.',
                'body' => '<p>Security is essential for every modern environment. Smart CCTV systems help homes, offices, schools, warehouses, and commercial facilities monitor activities, reduce blind spots, and respond faster to incidents.</p><p>For best results, organizations should combine camera placement, reliable recording, remote access, access control, and regular maintenance. ADYSURVE LTD designs surveillance solutions around the actual risks and operating needs of each facility.</p>',
                'is_featured' => true,
            ],
            [
                'title' => 'What to Consider Before Installing Solar Power',
                'slug' => 'what-to-consider-before-installing-solar-power',
                'category' => 'Solar Energy',
                'featured_image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1200&q=85',
                'excerpt' => 'Solar power works best when system design, battery capacity, inverter selection, and maintenance planning are handled professionally.',
                'body' => '<p>As energy demands continue to rise, solar power can reduce electricity costs and improve energy independence. The quality of the design matters as much as the quality of the equipment.</p><p>A professional assessment should review load requirements, roof or site conditions, inverter capacity, battery backup needs, and long-term maintenance. ADYSURVE LTD helps clients plan reliable solar systems for practical daily use.</p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Why Reliable Network Infrastructure Matters',
                'slug' => 'why-reliable-network-infrastructure-matters',
                'category' => 'IT Infrastructure',
                'featured_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=85',
                'excerpt' => 'Strong network infrastructure improves connectivity, productivity, data protection, and business continuity across growing organizations.',
                'body' => '<p>Modern businesses need more than basic technology tools. They need dependable systems that improve productivity, enhance security, reduce operational costs, and support long-term growth.</p><p>Professional network design, server support, cybersecurity, wireless deployment, maintenance, and monitoring help teams stay connected and protected. ADYSURVE LTD provides infrastructure support for businesses, schools, offices, and organizations.</p>',
                'is_featured' => false,
            ],
        ] as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], [
                ...$post,
                'meta_title' => $post['title'].' | ADYSURVE LTD',
                'meta_description' => $post['excerpt'],
                'is_published' => true,
                'published_at' => now()->subDays(random_int(2, 20)),
            ]);
        }
    }
}
