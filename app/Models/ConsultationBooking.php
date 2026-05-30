<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationBooking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_interest',
        'preferred_date',
        'preferred_time',
        'meeting_mode',
        'notes',
        'status',
        'is_read',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'is_read' => 'boolean',
    ];
}
