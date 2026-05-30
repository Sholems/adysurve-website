<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'service_id',
        'client_name',
        'location',
        'featured_image',
        'gallery_images',
        'description',
        'meta_title',
        'meta_description',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if (! $this->featured_image) {
            return asset('images/adysurve-hero-survey-engineering.jpg');
        }

        if (Str::startsWith($this->featured_image, ['http://', 'https://', '/'])) {
            return $this->featured_image;
        }

        return Storage::disk('public')->url($this->featured_image);
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('sitemap_xml'));
        static::deleted(fn () => Cache::forget('sitemap_xml'));
    }
}
