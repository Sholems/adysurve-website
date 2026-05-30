@props(['project'])
<article class="overflow-hidden rounded-lg border border-black/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
    <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" width="900" height="650" loading="lazy" class="h-56 w-full object-cover">
    <div class="p-6">
        <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-bold text-primary-dark">{{ $project->service?->title }}</span>
        <h3 class="mt-4 font-display text-xl font-bold text-dark-deeper">{{ $project->title }}</h3>
        <p class="mt-3 text-sm leading-7 text-[var(--color-text-muted)]">{{ $project->description }}</p>
        <a href="{{ route('projects.show', $project->slug) }}" class="mt-5 inline-block font-bold text-primary">View Details</a>
    </div>
</article>
