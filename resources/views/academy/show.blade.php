@php
    $courseSchema = [
        '@type' => 'Course',
        'name' => $program['title'],
        'description' => $metaDescription,
        'provider' => [
            '@type' => 'Organization',
            'name' => 'Megabyte Academy, a training arm of ADYSURVE LTD',
            'sameAs' => config('app.url'),
        ],
        'offers' => [
            '@type' => 'Offer',
            'category' => 'Training Program',
            'availability' => 'https://schema.org/InStock',
            'url' => request()->url(),
        ],
    ];
@endphp

<x-layout.app :title="$metaTitle" :description="$metaDescription" :schema="$courseSchema">
    <section class="relative overflow-hidden bg-dark-deeper py-16 text-white md:py-32">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_20%,rgba(201,151,43,0.22),transparent_32%),radial-gradient(circle_at_82%_72%,rgba(255,255,255,0.08),transparent_30%)]"></div>
        <div class="container-page relative grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <p class="inline-flex max-w-full items-center gap-2 rounded-full border border-primary/40 bg-primary/10 px-3 py-2 text-[10px] font-extrabold uppercase tracking-[0.12em] text-primary-light sm:px-4 sm:text-xs sm:tracking-widest">
                    <x-heroicon-o-academic-cap class="h-5 w-5" />
                    <span class="truncate">Megabyte Academy - A Training Arm of ADYSURVE LTD</span>
                </p>
                <h1 class="mt-6 max-w-5xl font-display text-3xl font-extrabold leading-tight md:text-6xl">{{ $program['title'] }}</h1>
                <h2 class="mt-4 max-w-4xl font-display text-xl font-extrabold leading-tight text-primary-light md:text-3xl">{{ $program['subtitle'] }}</h2>
                <h3 class="mt-4 text-lg font-extrabold text-white sm:text-xl">{{ $program['kicker'] }}</h3>
                <div class="mt-6 max-w-3xl space-y-4 text-base leading-8 text-white/74 sm:text-lg">
                    @foreach($program['intro'] as $paragraph)
                        <p>{!! $paragraph !!}</p>
                    @endforeach
                </div>
                <div class="mt-8 grid gap-3 sm:flex sm:flex-wrap sm:gap-4">
                    <a href="{{ route('contact', ['service' => $program['service']]) }}" class="rounded-full bg-primary px-7 py-4 text-center text-sm font-extrabold text-dark-deeper shadow-xl shadow-primary/20 transition hover:bg-primary-light">Enroll Today</a>
                    <a href="#curriculum" class="rounded-full border border-white/35 px-7 py-4 text-center text-sm font-extrabold text-white transition hover:border-primary hover:text-primary-light">View Curriculum</a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-[2rem] bg-primary/10 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-lg border border-white/15 bg-white/[0.06] p-6 shadow-2xl shadow-black/30 backdrop-blur">
                    <div class="rounded-lg bg-white p-6 text-dark-deeper">
                        <p class="text-sm font-extrabold uppercase tracking-widest text-primary-dark">Training Duration</p>
                        <p class="mt-3 font-display text-4xl font-extrabold sm:text-5xl">{{ $program['duration'] }}</p>
                        <div class="mt-7 grid gap-4">
                            @foreach($program['facts'] as $item)
                                <div class="flex gap-4 rounded-lg bg-light p-4">
                                    <x-dynamic-component :component="$item['icon']" class="h-7 w-7 shrink-0 text-primary-dark" />
                                    <div>
                                        <p class="text-xs font-extrabold uppercase tracking-widest text-dark/45">{{ $item['label'] }}</p>
                                        <p class="mt-1 font-bold">{{ $item['value'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 md:py-28">
        <div class="container-page grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">{{ $program['why']['label'] }}</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">{{ $program['why']['heading'] }}</h2>
                <p class="mt-6 leading-8 text-dark/68">{{ $program['why']['text'] }}</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach($program['why']['items'] as $item)
                    <div class="flex gap-3 rounded-lg border border-black/10 bg-light p-5">
                        <x-heroicon-s-check-circle class="h-6 w-6 shrink-0 text-primary-dark" />
                        <p class="font-bold leading-7 text-dark-deeper">{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="curriculum" class="bg-light py-16 md:py-28">
        <div class="container-page">
            <div class="mx-auto max-w-4xl text-center">
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">What You Will Learn</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">{{ $program['curriculum']['heading'] }}</h2>
                <p class="mt-5 leading-8 text-dark/65">{{ $program['curriculum']['text'] }}</p>
            </div>

            <div class="mt-10 grid gap-5 lg:mt-14 lg:grid-cols-2">
                @foreach($program['curriculum']['modules'] as [$title, $items])
                    <article class="rounded-lg border border-black/10 bg-white p-5 shadow-sm sm:p-7">
                        <h3 class="font-display text-xl font-extrabold text-dark-deeper sm:text-2xl">{{ $title }}</h3>
                        <ul class="mt-5 grid gap-3 text-dark/70">
                            @foreach($items as $item)
                                <li class="flex gap-3">
                                    <x-heroicon-o-arrow-right-circle class="mt-0.5 h-5 w-5 shrink-0 text-primary-dark" />
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-dark-deeper py-16 text-white md:py-28">
        <div class="container-page grid gap-12 lg:grid-cols-2 lg:items-start">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">{{ $program['corporate']['label'] }}</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight md:text-5xl">{{ $program['corporate']['heading'] }}</h2>
                <div class="mt-6 space-y-5 leading-8 text-white/72">
                    @foreach($program['corporate']['paragraphs'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
                <div class="mt-6 grid gap-3 sm:grid-cols-3">
                    @foreach($program['corporate']['methods'] as $item)
                        <div class="rounded-lg border border-white/15 bg-white/5 p-4 text-sm font-bold text-white/82">{{ $item }}</div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-lg border border-white/15 bg-white/[0.06] p-7">
                <h3 class="font-display text-2xl font-extrabold">{{ $program['corporate']['panel_heading'] }}</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach($program['corporate']['items'] as $item)
                        <div class="flex gap-3">
                            <x-heroicon-s-check-circle class="h-5 w-5 shrink-0 text-primary" />
                            <span class="font-bold text-white/85">{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 md:py-28">
        <div class="container-page grid gap-5 lg:grid-cols-3">
            @foreach($program['cards'] as $type => $card)
                <article class="rounded-lg border border-black/10 {{ $loop->even ? 'bg-white shadow-sm' : 'bg-light' }} p-5 sm:p-7">
                    <h2 class="font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">{{ $card['heading'] }}</h2>
                    <p class="mt-4 leading-8 text-dark/68">{{ $card['intro'] }}</p>
                    <ul class="mt-5 grid gap-3 text-dark/72">
                        @foreach($card['items'] as $item)
                            <li class="flex gap-3">
                                @if($type === 'careers')
                                    <x-heroicon-o-briefcase class="mt-1 h-5 w-5 shrink-0 text-primary-dark" />
                                @else
                                    <x-heroicon-o-check class="mt-1 h-5 w-5 shrink-0 text-primary-dark" />
                                @endif
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                    @if(! empty($card['note']))
                        <p class="mt-5 font-bold text-dark-deeper">{{ $card['note'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-primary py-16 text-dark-deeper">
        <div class="container-page grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest">Enroll Today</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight md:text-5xl">{{ $program['cta']['heading'] }}</h2>
                @foreach($program['cta']['paragraphs'] as $paragraph)
                    <p class="mt-5 max-w-4xl text-lg font-medium leading-8">{!! $paragraph !!}</p>
                @endforeach
                <p class="mt-6 font-display text-2xl font-extrabold">ADYSURVE LTD</p>
                <p class="font-bold">Smart Solutions for a Secure Future.</p>
            </div>
            <a href="{{ route('contact', ['service' => $program['service']]) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-dark-deeper px-8 py-4 text-sm font-extrabold text-white shadow-xl transition hover:bg-black">
                Enroll Today
                <x-heroicon-o-arrow-up-right class="h-4 w-4" />
            </a>
        </div>
    </section>
</x-layout.app>
