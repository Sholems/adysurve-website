<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'photo',
        'bio',
        'social_links',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
