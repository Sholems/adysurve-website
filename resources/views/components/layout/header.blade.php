<header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-black/5 bg-white/95 backdrop-blur">
    <div class="container-page flex h-16 items-center justify-between gap-3 md:h-20">
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-2 sm:gap-3" aria-label="ADYSURVE LTD home">
            <img src="{{ asset('images/ady-logo.png') }}" alt="" width="90" height="84" class="h-10 w-auto shrink-0 object-contain sm:h-12">
            <span class="min-w-0 leading-none">
                <span class="block truncate font-display text-base font-extrabold tracking-normal text-dark-deeper sm:text-xl">ADYSURVE LTD</span>
                <span class="mt-1 block max-w-[190px] truncate text-[8px] font-bold uppercase tracking-[0.12em] text-primary-dark sm:max-w-none sm:text-[10px] sm:tracking-widest">Smart Solutions for a Secure Future</span>
            </span>
        </a>
        <nav class="hidden items-center gap-8 text-sm font-bold text-dark md:flex">
            <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
            <a href="{{ route('about') }}" class="hover:text-primary">About</a>
            <div class="group relative">
                <a href="{{ route('services') }}" class="inline-flex items-center gap-1 hover:text-primary">
                    Services
                    <x-heroicon-o-chevron-down class="h-4 w-4" />
                </a>
                <div class="invisible absolute left-1/2 top-full w-[26rem] -translate-x-1/2 translate-y-4 rounded-lg border border-black/5 bg-white p-3 opacity-0 shadow-2xl shadow-black/15 transition group-hover:visible group-hover:translate-y-2 group-hover:opacity-100">
                    <div class="rounded-lg bg-dark-deeper px-4 py-3 text-white">
                        <p class="text-xs font-extrabold uppercase tracking-widest text-primary">Our Services</p>
                        <p class="mt-1 text-sm text-white/70">Professional technology, security, energy, and media solutions.</p>
                    </div>
                    <div class="mt-3 grid gap-2">
                        @foreach($layoutMenuServices as $service)
                            <a href="{{ route('services.show', $service->slug) }}" class="group/item flex gap-4 rounded-lg border border-transparent p-3 transition hover:border-primary/30 hover:bg-light">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary-dark transition group-hover/item:bg-primary group-hover/item:text-dark-deeper">
                                    <x-dynamic-component :component="$serviceIcons[$service->slug] ?? ($service->icon ?: 'heroicon-o-briefcase')" class="h-6 w-6" />
                                </span>
                                <span>
                                    <span class="block font-display text-sm font-extrabold leading-snug text-dark-deeper group-hover/item:text-primary-dark">{{ $service->title }}</span>
                                    <span class="mt-1 block text-xs leading-5 text-dark/58">{{ \Illuminate\Support\Str::limit($service->short_description, 92) }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('projects') }}" class="hover:text-primary">Projects</a>
            <div class="group relative">
                <a href="{{ route('academy.network-security') }}" class="inline-flex items-center gap-1 hover:text-primary">
                    Megabyte Academy
                    <x-heroicon-o-chevron-down class="h-4 w-4" />
                </a>
                <div class="invisible absolute left-1/2 top-full w-[28rem] -translate-x-1/2 translate-y-4 rounded-lg border border-black/5 bg-white p-3 opacity-0 shadow-2xl shadow-black/15 transition group-hover:visible group-hover:translate-y-2 group-hover:opacity-100">
                    <div class="rounded-lg bg-dark-deeper px-4 py-3 text-white">
                        <p class="text-xs font-extrabold uppercase tracking-widest text-primary">Megabyte Academy</p>
                        <p class="mt-1 text-sm text-white/70">A training arm of ADYSURVE LTD</p>
                    </div>
                    <div class="mt-3 grid gap-2">
                        @foreach($academyPrograms as $program)
                            <a href="{{ $program['url'] }}" class="group/item flex gap-4 rounded-lg border border-transparent p-3 transition hover:border-primary/30 hover:bg-light">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary-dark transition group-hover/item:bg-primary group-hover/item:text-dark-deeper">
                                    <x-dynamic-component :component="$program['icon']" class="h-6 w-6" />
                                </span>
                                <span>
                                    <span class="block font-display text-sm font-extrabold leading-snug text-dark-deeper group-hover/item:text-primary-dark">{{ $program['title'] }}</span>
                                    <span class="mt-1 block text-xs leading-5 text-dark/58">{{ $program['description'] }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('blog') }}" class="hover:text-primary">Blog</a>
            <a href="{{ route('contact') }}" class="rounded-full bg-primary px-5 py-3 text-dark-deeper hover:bg-primary-light">Contact Us</a>
        </nav>
        <button type="button" class="shrink-0 rounded-lg p-2 md:hidden" @click="open = !open" aria-label="Toggle navigation">
            <x-heroicon-o-bars-3 class="h-8 w-8" />
        </button>
    </div>
    <div x-show="open" x-cloak class="border-t bg-white md:hidden">
        <div class="container-page grid max-h-[calc(100vh-4rem)] gap-3 overflow-y-auto py-5 text-sm font-bold">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('services') }}">Services</a>
            @foreach($layoutMenuServices as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="flex items-center gap-3 pl-4 text-dark/70">
                    <x-dynamic-component :component="$serviceIcons[$service->slug] ?? ($service->icon ?: 'heroicon-o-briefcase')" class="h-5 w-5 text-primary-dark" />
                    <span>{{ $service->title }}</span>
                </a>
            @endforeach
            <a href="{{ route('projects') }}">Projects</a>
            <a href="{{ route('academy.network-security') }}">Megabyte Academy</a>
            @foreach($academyPrograms as $program)
                <a href="{{ $program['url'] }}" class="flex items-center gap-3 pl-4 text-dark/70">
                    <x-dynamic-component :component="$program['icon']" class="h-5 w-5 text-primary-dark" />
                    <span>{{ $program['title'] }}</span>
                </a>
            @endforeach
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('contact') }}" class="rounded-full bg-primary px-5 py-3 text-center text-dark-deeper">Contact Us</a>
        </div>
    </div>
</header>
