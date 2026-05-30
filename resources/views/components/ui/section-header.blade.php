@props(['eyebrow' => null, 'title', 'subtitle' => null, 'theme' => 'light'])
<div class="mx-auto max-w-3xl text-center">
    @if($eyebrow)
        <p class="text-sm font-bold uppercase tracking-widest text-primary">{{ $eyebrow }}</p>
    @endif
    <h2 @class([
        'mt-3 font-display text-3xl font-extrabold md:text-5xl',
        'text-white' => $theme === 'dark',
        'text-dark-deeper' => $theme !== 'dark',
    ])>{{ $title }}</h2>
    @if($subtitle)
        <p @class([
            'mt-4 text-lg leading-8',
            'text-white/70' => $theme === 'dark',
            'text-[var(--color-text-muted)]' => $theme !== 'dark',
        ])>{{ $subtitle }}</p>
    @endif
</div>
