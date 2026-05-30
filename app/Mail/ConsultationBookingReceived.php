<?php

namespace App\Mail;

use App\Models\ConsultationBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationBookingReceived extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public ConsultationBooking $booking)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('New free consultation booking: '.$this->booking->preferred_date->format('M j, Y').' at '.$this->booking->preferred_time)
            ->text('emails.consultation-booking-received');
    }
}
