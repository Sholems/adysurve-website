<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <x-ui.page-hero title="Blog" subtitle="Insights on secure infrastructure, renewable energy, CCTV, digital training, and smart business technology." />

    @if($featuredPost)
        <section class="bg-white py-16">
            <div class="container-page">
                <article class="grid overflow-hidden rounded-lg border border-black/10 bg-dark-deeper text-white shadow-2xl lg:grid-cols-[1.05fr_0.95fr]">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="block overflow-hidden">
                        <img src="{{ $featuredPost->featured_image_url }}" alt="{{ $featuredPost->title }}" width="1200" height="820" class="h-full min-h-[360px] w-full object-cover opacity-88">
                    </a>
                    <div class="flex flex-col justify-center p-5 sm:p-8 md:p-12">
                        <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Featured Article</p>
                        <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight md:text-5xl">
                            <a href="{{ route('blog.show', $featuredPost->slug) }}" class="transition hover:text-primary-light">{{ $featuredPost->title }}</a>
                        </h2>
                        <p class="mt-5 leading-8 text-white/72">{{ $featuredPost->excerpt }}</p>
                        <a href="{{ route('blog.show', $featuredPost->slug) }}" class="mt-8 inline-flex w-fit items-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-extrabold text-dark-deeper transition hover:bg-primary-light">
                            Read Featured Article
                            <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                        </a>
                    </div>
                </article>
            </div>
        </section>
    @endif

    <section class="bg-light py-16 md:py-28">
        <div class="container-page">
            <div class="mb-12 max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Archive</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold text-dark-deeper md:text-4xl">All articles</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                @forelse($posts as $post)
                    <x-ui.blog-card :post="$post" />
                @empty
                    <div class="rounded-lg border border-black/10 bg-white p-5 text-dark/65 sm:p-8 md:col-span-3">
                        No blog posts have been published yet.
                    </div>
                @endforelse
            </div>

            <div class="mt-10">{{ $posts->links() }}</div>
        </div>
    </section>
</x-layout.app>
