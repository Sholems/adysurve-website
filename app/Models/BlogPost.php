<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'featured_image',
        'excerpt',
        'body',
        'meta_title',
        'meta_description',
        'is_featured',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->where(function (Builder $query) {
                $query->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function getDisplayDateAttribute(): ?Carbon
    {
        return $this->published_at ?: $this->created_at;
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
