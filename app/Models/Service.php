<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'featured_image',
        'short_description',
        'full_description',
        'meta_title',
        'meta_description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
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
