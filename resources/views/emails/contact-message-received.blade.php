New website enquiry from ADYSURVE LTD

Name: {{ $messageRecord->name }}
Email: {{ $messageRecord->email }}
Phone: {{ $messageRecord->phone ?: 'Not provided' }}
Service Interest: {{ $messageRecord->service_interest ?: 'Not provided' }}
Subject: {{ $messageRecord->subject }}

Message:
{{ $messageRecord->message }}
