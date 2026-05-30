@props([
    'title' => config('app.name'),
    'description' => 'ADYSURVE LTD offers IT infrastructure, CCTV, solar energy, IT training, and graphic design services in Nigeria.',
    'image' => asset('images/ady-logo.png'),
    'canonical' => request()->url(),
    'type' => 'website',
    'schema' => null,
])
@php
    $settings = \App\Models\SiteSetting::allCached();
    $socialLinks = collect([
        $settings['facebook_url'] ?? null,
        $settings['instagram_url'] ?? null,
        $settings['linkedin_url'] ?? null,
        $settings['twitter_url'] ?? null,
        $settings['youtube_url'] ?? null,
        $settings['tiktok_url'] ?? null,
    ])->filter()->values()->all();
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'ADYSURVE LTD',
        'url' => config('app.url'),
        'logo' => asset('images/ady-logo.png'),
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => $settings['site_phone'] ?? '+234 XXX XXX XXXX',
            'email' => $settings['site_email'] ?? 'info@adysurve.com',
            'contactType' => 'customer service',
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $settings['site_address'] ?? 'Nigeria',
            'addressCountry' => 'NG',
        ],
    ];

    if ($socialLinks) {
        $organizationSchema['sameAs'] = $socialLinks;
    }

    $schemas = collect([$organizationSchema])
        ->when($schema, fn ($collection) => $collection->push($schema))
        ->values()
        ->all();
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $canonical }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="ADYSURVE LTD">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => $schemas,
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
