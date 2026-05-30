<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    #[DataProvider('publicRouteProvider')]
    public function test_public_pages_load_successfully(string $routeName): void
    {
        $this->get(route($routeName))->assertOk();
    }

    public function test_active_service_detail_pages_load_successfully(): void
    {
        Service::query()
            ->where('is_active', true)
            ->pluck('slug')
            ->each(fn (string $slug) => $this->get(route('services.show', $slug))->assertOk());
    }

    public function test_project_and_blog_detail_pages_load_successfully(): void
    {
        $project = Project::query()->where('is_active', true)->firstOrFail();
        $post = BlogPost::query()->published()->firstOrFail();

        $this->get(route('projects.show', $project->slug))->assertOk();
        $this->get(route('blog.show', $post->slug))->assertOk();
    }

    public function test_contact_form_stores_valid_messages(): void
    {
        $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'Ada Johnson',
            'email' => 'ada@example.com',
            'phone' => '+234 800 000 0000',
            'service_interest' => 'Solar Renewable Energy',
            'subject' => 'Solar installation request',
            'message' => 'Please contact me about a solar installation for my office.',
        ])->assertRedirect(route('contact'));

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'ada@example.com',
            'subject' => 'Solar installation request',
        ]);
    }

    public function test_consultation_booking_form_stores_valid_bookings(): void
    {
        $this->from(route('contact'))->post(route('consultation.store'), [
            'name' => 'Ada Johnson',
            'email' => 'ada@example.com',
            'phone' => '+234 800 000 0000',
            'service_interest' => 'Networks & Security',
            'preferred_date' => now()->addWeekday()->toDateString(),
            'preferred_time' => '10:00',
            'meeting_mode' => 'Phone Call',
            'notes' => 'I need a free consultation for network security.',
        ])->assertRedirect(route('contact'));

        $this->assertDatabaseHas('consultation_bookings', [
            'email' => 'ada@example.com',
            'preferred_time' => '10:00',
            'status' => 'pending',
        ]);
    }

    public static function publicRouteProvider(): array
    {
        return [
            ['home'],
            ['about'],
            ['services'],
            ['projects'],
            ['blog'],
            ['contact'],
            ['privacy'],
            ['terms'],
            ['academy.network-security'],
            ['academy.cctv-security'],
            ['academy.solar-renewable-energy'],
            ['academy.it-essentials'],
            ['academy.graphic-design-media'],
            ['sitemap'],
        ];
    }
}
