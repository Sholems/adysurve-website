<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    private const CACHE_KEY = 'site_settings_all';

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    public static function getValue(string $key, ?string $default = null): ?string
    {
        return static::allCached()[$key] ?? $default;
    }

    public static function getMany(array $keys, ?string $default = null): array
    {
        $settings = static::allCached();

        return collect($keys)
            ->mapWithKeys(fn (string $key) => [$key => $settings[$key] ?? $default])
            ->all();
    }

    public static function allCached(): array
    {
        return cache()->remember(self::CACHE_KEY, 3600, function () {
            return static::query()
                ->pluck('value', 'key')
                ->all();
        });
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }
}
