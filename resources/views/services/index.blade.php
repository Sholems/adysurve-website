<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <x-ui.page-hero title="Services" subtitle="Focused technology, security, power, training, and media support for Nigerian organizations." />
    <section class="py-16 md:py-28">
        <div class="container-page grid gap-6 md:grid-cols-2">
            @foreach($services as $service)
                <article class="grid overflow-hidden rounded-lg border border-black/10 bg-white shadow-sm md:grid-cols-2">
                    <img src="{{ $service->featured_image_url }}" alt="{{ $service->title }}" width="800" height="600" loading="lazy" class="h-full min-h-64 w-full object-cover">
                    <div class="p-5 sm:p-8">
                        @if($service->icon)<x-dynamic-component :component="$service->icon" class="h-10 w-10 text-primary" />@endif
                        <h2 class="mt-5 font-display text-2xl font-bold">{{ $service->title }}</h2>
                        <p class="mt-4 leading-8 text-[var(--color-text-muted)]">{{ $service->short_description }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="mt-6 inline-block rounded-full bg-primary px-6 py-3 font-bold text-dark-deeper">Read More</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layout.app>
