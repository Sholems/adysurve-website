New free consultation booking from ADYSURVE LTD

Name: {{ $booking->name }}
Email: {{ $booking->email }}
Phone: {{ $booking->phone ?: 'Not provided' }}
Service Interest: {{ $booking->service_interest ?: 'Not provided' }}
Preferred Date: {{ $booking->preferred_date->format('l, F j, Y') }}
Preferred Time: {{ $booking->preferred_time }}
Meeting Mode: {{ $booking->meeting_mode }}
Status: {{ ucfirst($booking->status) }}

Notes:
{{ $booking->notes ?: 'No additional notes provided.' }}
