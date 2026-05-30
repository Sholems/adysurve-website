<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public ContactMessage $messageRecord)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('New website enquiry: '.$this->messageRecord->subject)
            ->text('emails.contact-message-received');
    }
}
