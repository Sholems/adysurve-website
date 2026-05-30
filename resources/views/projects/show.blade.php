<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <section class="relative bg-dark-deeper py-24 text-white">
        <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" width="1600" height="900" class="absolute inset-0 h-full w-full object-cover opacity-35">
        <div class="container-page relative">
            <span class="rounded-full bg-primary px-4 py-2 text-sm font-bold text-dark-deeper">{{ $project->service?->title }}</span>
            <h1 class="mt-6 max-w-4xl font-display text-5xl font-extrabold">{{ $project->title }}</h1>
            <p class="mt-4 text-white/75">{{ $project->location }} @if($project->client_name) &middot; {{ $project->client_name }} @endif</p>
        </div>
    </section>
    <section class="py-16 md:py-20">
        <div class="container-page prose prose-lg max-w-4xl">
            <p>{{ $project->description }}</p>
        </div>
    </section>
</x-layout.app>
