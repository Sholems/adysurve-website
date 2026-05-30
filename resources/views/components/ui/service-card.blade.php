@props(['service'])
<article class="group flex h-full flex-col rounded-lg border border-black/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-primary hover:shadow-xl">
    @if($service->icon)
        <x-dynamic-component :component="$service->icon" class="h-10 w-10 text-primary" />
    @endif
    <h3 class="mt-5 font-display text-xl font-bold text-dark-deeper">{{ $service->title }}</h3>
    <p class="mt-3 flex-1 text-sm leading-7 text-[var(--color-text-muted)]">{{ $service->short_description }}</p>
    <a href="{{ route('services.show', $service->slug) }}" class="mt-5 font-bold text-primary">Learn More</a>
</article>
