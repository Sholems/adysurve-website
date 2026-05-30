<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'ADYSURVE LTD.',
            'site_tagline' => 'Securing Tomorrow, Today',
            'site_email' => 'info@adysurve.com',
            'site_phone' => '+234 XXX XXX XXXX',
            'site_address' => 'Nigeria',
            'site_whatsapp' => '+234 XXX XXX XXXX',
            'business_hours' => 'Mon-Fri, 8:00-17:00',
            'google_analytics_id' => '',
            'facebook_url' => '',
            'twitter_url' => '',
            'linkedin_url' => '',
            'instagram_url' => '',
            'youtube_url' => '',
            'tiktok_url' => '',
            'hero_headline' => 'Professional IT, Security & Energy Solutions',
            'hero_subheadline' => 'We protect your infrastructure, power your future, and connect your world.',
            'about_summary' => 'ADYSURVE LTD is a Nigerian technology and security company delivering practical infrastructure, surveillance, solar, training, and media solutions for modern organizations.',
        ];

        foreach ($settings as $key => $value) {
            $type = str_ends_with($key, '_url') ? 'url' : (str_contains($key, 'email') ? 'email' : (str_contains($key, 'phone') || str_contains($key, 'whatsapp') ? 'phone' : 'text'));

            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => $type]);
        }
    }
}
