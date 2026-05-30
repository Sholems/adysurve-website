<?php

namespace App\Http\Controllers;

use App\Mail\ConsultationBookingReceived;
use App\Models\ConsultationBooking;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ConsultationBookingController extends Controller
{
    public function store(Request $request)
    {
        $slots = collect(config('consultation.slots'))->pluck('value')->all();
        $modes = config('consultation.modes');

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:60'],
            'service_interest' => ['nullable', 'string', 'max:180'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'preferred_time' => ['required', Rule::in($slots)],
            'meeting_mode' => ['required', Rule::in($modes)],
            'notes' => ['nullable', 'string', 'max:2000'],
            'website' => ['nullable', 'prohibited'],
        ]);

        unset($data['website']);

        $alreadyBooked = ConsultationBooking::query()
            ->where('preferred_date', $data['preferred_date'])
            ->where('preferred_time', $data['preferred_time'])
            ->whereNotIn('status', ['cancelled', 'completed'])
            ->exists();

        if ($alreadyBooked) {
            return back()
                ->withErrors(['preferred_time' => 'That consultation slot has already been requested. Please choose another time.'])
                ->withInput();
        }

        $booking = ConsultationBooking::create($data);

        try {
            Mail::to(SiteSetting::getValue('site_email', config('mail.from.address')))
                ->send(new ConsultationBookingReceived($booking));
        } catch (\Throwable $exception) {
            Log::warning('Unable to send consultation booking notification.', [
                'consultation_booking_id' => $booking->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return back()->with('booking_status', 'Your free consultation has been requested. Our team will confirm the appointment shortly.');
    }
}
