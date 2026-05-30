@props(['post'])

<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-black/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
    <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden bg-dark-deeper">
        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" width="900" height="620" loading="lazy" class="aspect-[16/10] w-full object-cover opacity-90 transition duration-500 group-hover:scale-105">
    </a>
    <div class="flex flex-1 flex-col p-6">
        <div class="flex flex-wrap items-center gap-3 text-xs font-extrabold uppercase tracking-widest text-primary-dark">
            @if($post->category)
                <span>{{ $post->category }}</span>
            @endif
            @if($post->display_date)
                <span class="text-dark/35">/</span>
                <time datetime="{{ $post->display_date->toDateString() }}">{{ $post->display_date->format('M d, Y') }}</time>
            @endif
        </div>
        <h3 class="mt-4 font-display text-xl font-extrabold leading-tight text-dark-deeper">
            <a href="{{ route('blog.show', $post->slug) }}" class="transition hover:text-primary-dark">{{ $post->title }}</a>
        </h3>
        <p class="mt-4 flex-1 text-sm leading-7 text-dark/68">{{ $post->excerpt }}</p>
        <a href="{{ route('blog.show', $post->slug) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-primary-dark">
            Read Article
            <x-heroicon-o-arrow-up-right class="h-4 w-4" />
        </a>
    </div>
</article>
