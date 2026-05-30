@props([
    'title' => config('app.name'),
    'description' => 'ADYSURVE LTD offers IT infrastructure, CCTV, solar energy, IT training, and graphic design services in Nigeria.',
    'schema' => null,
])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <x-seo.meta :title="$title" :description="$description" :schema="$schema" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <x-layout.header />
    <main>{{ $slot }}</main>
    <x-layout.footer />
</body>
</html>
