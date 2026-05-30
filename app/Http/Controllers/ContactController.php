<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::query()->where('is_active', true)->orderBy('sort_order')->get();
        $academyOptions = collect(config('academy-programs'))
            ->map(fn (array $program) => $program['title'])
            ->values();
        $serviceOptions = $services
            ->pluck('title')
            ->merge($academyOptions)
            ->unique()
            ->values();
        $selectedService = $services->firstWhere('slug', request('service'))?->title
            ?? $serviceOptions->first(fn (string $service) => $service === request('service'));

        return view('contact.index', [
            'services' => $services,
            'serviceOptions' => $serviceOptions,
            'selectedService' => $selectedService,
            'consultationSlots' => config('consultation.slots'),
            'consultationModes' => config('consultation.modes'),
            'settings' => fn (string $key, ?string $default = null) => SiteSetting::getValue($key, $default),
            'metaTitle' => 'Contact ADYSURVE LTD | Get a Free Consultation',
            'metaDescription' => 'Contact ADYSURVE LTD for IT support, CCTV installation, solar energy, and graphic design services in Nigeria. Request a free quote today.',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:60'],
            'service_interest' => ['nullable', 'string', 'max:160'],
            'subject' => ['required', 'string', 'max:180'],
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['nullable', 'prohibited'],
        ]);

        unset($data['website']);

        $message = ContactMessage::create($data);

        try {
            Mail::to(SiteSetting::getValue('site_email', config('mail.from.address')))
                ->send(new ContactMessageReceived($message));
        } catch (\Throwable $exception) {
            Log::warning('Unable to send contact message notification.', [
                'contact_message_id' => $message->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return back()->with('status', 'Thank you. Your message has been received and our team will respond shortly.');
    }
}
