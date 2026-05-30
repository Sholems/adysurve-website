<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <x-ui.page-hero title="Projects" subtitle="A growing portfolio of practical implementations across ADYSURVE service areas." />
    <section class="py-16 md:py-28" x-data="{ filter: 'all' }">
        <div class="container-page">
            <div class="mb-10 flex flex-wrap gap-3">
                <button class="rounded-full border px-5 py-2 font-bold" @click="filter = 'all'">All</button>
                @foreach($services as $service)
                    <button class="rounded-full border px-5 py-2 font-bold" @click="filter = '{{ $service->slug }}'">{{ $service->title }}</button>
                @endforeach
            </div>
            <div class="grid gap-6 md:grid-cols-3">
                @foreach($projects as $project)
                    <div x-show="filter === 'all' || filter === '{{ $project->service?->slug }}'">
                        <x-ui.project-card :project="$project" />
                    </div>
                @endforeach
            </div>
            <div class="mt-10">{{ $projects->links() }}</div>
        </div>
    </section>
</x-layout.app>
