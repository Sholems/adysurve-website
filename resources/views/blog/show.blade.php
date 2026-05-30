@php
    $blogSchema = [
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $metaDescription,
        'image' => $post->featured_image_url,
        'datePublished' => optional($post->display_date)->toAtomString(),
        'dateModified' => optional($post->updated_at)->toAtomString(),
        'author' => [
            '@type' => 'Organization',
            'name' => 'ADYSURVE LTD',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'ADYSURVE LTD',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/ady-logo.png'),
            ],
        ],
        'mainEntityOfPage' => request()->url(),
    ];
@endphp

<x-layout.app :title="$metaTitle" :description="$metaDescription" :schema="$blogSchema">
    <article>
        <section class="relative overflow-hidden bg-dark-deeper py-24 text-white">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" width="1600" height="900" class="absolute inset-0 h-full w-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/70 to-black/45"></div>
            <div class="container-page relative">
                <div class="flex flex-wrap items-center gap-3 text-sm font-extrabold uppercase tracking-widest text-primary">
                    @if($post->category)
                        <span>{{ $post->category }}</span>
                    @endif
                    @if($post->display_date)
                        <span class="text-white/35">/</span>
                        <time datetime="{{ $post->display_date->toDateString() }}">{{ $post->display_date->format('M d, Y') }}</time>
                    @endif
                </div>
                <h1 class="mt-5 max-w-5xl font-display text-3xl font-extrabold leading-tight md:text-6xl">{{ $post->title }}</h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-white/75">{{ $post->excerpt }}</p>
            </div>
        </section>

        <section class="bg-white py-16 md:py-20">
            <div class="container-page grid gap-12 lg:grid-cols-[minmax(0,1fr)_320px]">
                <div class="prose prose-lg max-w-none prose-headings:font-display prose-headings:text-dark-deeper prose-p:leading-8 prose-a:text-primary-dark">
                    {!! $post->body !!}
                </div>

                <aside class="space-y-5">
                    <div class="rounded-lg border border-black/10 bg-light p-6">
                        <h2 class="font-display text-xl font-extrabold text-dark-deeper">Need help with a project?</h2>
                        <p class="mt-3 text-sm leading-7 text-dark/65">Talk to ADYSURVE about IT infrastructure, CCTV, solar energy, digital training, or media communication support.</p>
                        <a href="{{ route('contact') }}" class="mt-5 inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-extrabold text-dark-deeper">
                            Contact Us
                            <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                        </a>
                    </div>

                    @if($relatedPosts->isNotEmpty())
                        <div class="rounded-lg border border-black/10 bg-white p-6 shadow-sm">
                            <h2 class="font-display text-xl font-extrabold text-dark-deeper">Related articles</h2>
                            <div class="mt-5 grid gap-5">
                                @foreach($relatedPosts as $relatedPost)
                                    <a href="{{ route('blog.show', $relatedPost->slug) }}" class="block border-b border-black/10 pb-5 last:border-b-0 last:pb-0">
                                        <span class="text-xs font-extrabold uppercase tracking-widest text-primary-dark">{{ $relatedPost->category }}</span>
                                        <span class="mt-2 block font-bold leading-snug text-dark-deeper">{{ $relatedPost->title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </section>
    </article>
</x-layout.app>
