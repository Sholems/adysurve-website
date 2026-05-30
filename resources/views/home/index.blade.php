<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <section class="relative overflow-hidden bg-dark-deeper text-white lg:min-h-[calc(100vh-5rem)]">
        <picture>
            <source
                type="image/webp"
                srcset="{{ asset('images/adysurve-hero-survey-engineering-768.webp') }} 768w, {{ asset('images/adysurve-hero-survey-engineering-1200.webp') }} 1200w, {{ asset('images/adysurve-hero-survey-engineering-1920.webp') }} 1920w"
                sizes="100vw"
            >
            <img src="{{ asset('images/adysurve-hero-survey-engineering.jpg') }}" alt="ADYSURVE engineering professionals working on a solar installation" width="1920" height="1152" fetchpriority="high" class="absolute inset-0 h-full w-full object-cover object-center opacity-20">
        </picture>
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/78 to-black/60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_28%,rgba(201,151,43,0.22),transparent_30%),radial-gradient(circle_at_82%_38%,rgba(232,184,75,0.13),transparent_32%)]"></div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-dark-deeper to-transparent"></div>
        <div class="container-page relative grid items-center gap-10 py-14 sm:py-16 lg:min-h-[calc(100vh-5rem)] lg:grid-cols-[1fr_0.88fr] lg:py-24">
            <div>
                <div class="inline-flex max-w-full items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-2 text-[10px] font-bold uppercase tracking-[0.12em] text-primary-light shadow-2xl backdrop-blur-md sm:gap-3 sm:px-4 sm:text-xs sm:tracking-widest">
                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                    <span class="truncate">Surveying &bull; Geospatial &bull; Engineering</span>
                </div>
                <h1 class="mt-6 max-w-4xl font-display text-[2.35rem] font-extrabold leading-[1.08] tracking-normal text-white drop-shadow-2xl sm:text-5xl xl:text-6xl">
                    Precision Surveying & Engineering Solutions You Can Trust
                </h1>
                <p class="mt-6 max-w-3xl text-base font-medium leading-8 text-white/88 drop-shadow-lg sm:text-lg md:text-2xl md:leading-10">
                    ADYSURVE LTD delivers professional surveying, geospatial, engineering, and land consultancy services with accuracy, innovation, and reliability - helping businesses, developers, and individuals build with confidence.
                </p>
                <div class="mt-8 grid gap-3 sm:flex sm:flex-wrap sm:items-center sm:gap-4">
                    <a href="{{ route('contact') }}" class="rounded-full bg-primary px-6 py-4 text-center text-sm font-extrabold text-dark-deeper shadow-2xl shadow-black/30 transition hover:bg-primary-light sm:px-8">Request a Consultation</a>
                    <a href="{{ route('services') }}" class="rounded-full border border-white/60 bg-white/10 px-6 py-4 text-center text-sm font-extrabold text-white backdrop-blur-md transition hover:border-primary hover:text-primary sm:px-8">Explore Services</a>
                </div>
                <div class="mt-9 grid max-w-3xl gap-3 sm:grid-cols-3 lg:mt-12">
                    @foreach(['Accurate Field Data', 'Land & Engineering Insight', 'Reliable Project Support'] as $badge)
                        <div class="rounded-lg border border-white/15 bg-white/10 px-4 py-3 text-sm font-bold text-white/90 shadow-xl backdrop-blur-md sm:py-4">{{ $badge }}</div>
                    @endforeach
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="absolute -inset-5 rounded-[2rem] border border-primary/30 bg-primary/10 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[1.75rem] border border-white/18 bg-white/10 p-3 shadow-2xl shadow-black/40 backdrop-blur-md">
                    <picture>
                        <source
                            type="image/webp"
                            srcset="{{ asset('images/adysurve-hero-survey-engineering-768.webp') }} 768w, {{ asset('images/adysurve-hero-survey-engineering-1200.webp') }} 1200w"
                            sizes="(min-width: 1024px) 42vw, 100vw"
                        >
                        <img src="{{ asset('images/adysurve-hero-survey-engineering.jpg') }}" alt="ADYSURVE field engineering and solar installation work" width="1200" height="900" class="aspect-[4/5] w-full rounded-[1.35rem] object-cover object-center">
                    </picture>
                    <div class="absolute left-8 top-8 rounded-full border border-white/20 bg-black/45 px-5 py-3 text-sm font-extrabold text-white shadow-xl backdrop-blur-md">Precision-led delivery</div>
                    <div class="absolute bottom-8 left-8 right-8 grid grid-cols-2 gap-3">
                        <div class="rounded-lg border border-white/15 bg-black/45 p-5 backdrop-blur-md">
                            <p class="font-display text-3xl font-extrabold text-primary">360&deg;</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-widest text-white/75">Project View</p>
                        </div>
                        <div class="rounded-lg border border-white/15 bg-black/45 p-5 backdrop-blur-md">
                            <p class="font-display text-3xl font-extrabold text-primary">99%</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-widest text-white/75">Accuracy Focus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative z-10 -mt-7 sm:-mt-10">
        <div class="container-page grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            @foreach(['500+ Projects', '10+ Years Experience', '98% Client Satisfaction', '5 Core Services'] as $stat)
                <div class="rounded-lg bg-white p-4 text-center font-display text-base font-bold shadow-xl sm:p-6 sm:text-xl">{{ $stat }}</div>
            @endforeach
        </div>
    </section>
    <section class="relative overflow-hidden bg-white pb-10 pt-16 md:pb-14 md:pt-24">
        <div class="container-page">
            <div class="mx-auto max-w-4xl text-center">
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Our Services</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">
                    Enhance your operations with <span class="inline-block rounded-md bg-primary px-2.5 py-0.5 align-baseline leading-tight text-white sm:px-3">ADYSURVE</span> services
                </h2>
            </div>

            <div class="mt-10 grid gap-6 lg:mt-14 lg:grid-cols-3">
                @foreach($services->take(3) as $service)
                    <article class="group relative overflow-hidden rounded-2xl border border-black/10 bg-dark-deeper p-6 text-center text-white shadow-2xl shadow-black/10 transition hover:-translate-y-2 sm:p-8 md:p-10">
                        <div class="absolute right-0 top-0 h-16 w-16 bg-white"></div>
                        <div class="absolute right-0 top-0 h-20 w-20 rounded-bl-[2rem] bg-white"></div>
                        <div class="absolute bottom-0 right-0 h-16 w-16 bg-white"></div>
                        <div class="absolute bottom-0 right-0 h-20 w-20 rounded-tl-[2rem] bg-dark-deeper"></div>
                        <div class="relative">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-primary shadow-xl">
                                @if($service->icon)
                                    <x-dynamic-component :component="$service->icon" class="h-9 w-9" />
                                @endif
                            </div>
                            <h3 class="mt-7 font-display text-xl font-extrabold leading-tight sm:text-2xl">{{ $service->title }}</h3>
                            <p class="mx-auto mt-4 max-w-xs text-sm leading-7 text-white/78 lg:min-h-32">{{ $service->short_description }}</p>
                            <div class="mx-auto mt-8 h-px max-w-xs bg-white/20"></div>
                            <a href="{{ route('services.show', $service->slug) }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-white/70 px-5 py-3 text-sm font-extrabold text-white transition hover:border-primary hover:bg-primary hover:text-dark-deeper">
                                Learn More
                                <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full bg-primary px-7 py-4 text-sm font-extrabold text-dark-deeper shadow-xl shadow-primary/20 transition hover:bg-primary-light">
                    View All Services
                    <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                </a>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-dark-deeper py-16 text-white md:py-28">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_18%,rgba(201,151,43,0.18),transparent_30%),radial-gradient(circle_at_78%_82%,rgba(232,184,75,0.10),transparent_34%)]"></div>
        <div class="container-page relative grid gap-14 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
            <div class="relative">
                <div class="absolute -left-6 top-12 hidden h-[78%] w-px bg-white/18 md:block"></div>
                <div class="absolute -right-6 top-12 hidden h-[78%] w-px bg-white/18 md:block"></div>
                <div class="relative mx-auto max-w-[460px] border border-white/15 bg-white/[0.04] p-5 shadow-2xl shadow-black/25 backdrop-blur">
                    <div class="relative overflow-hidden bg-[#090812] px-5 py-8 sm:px-8 sm:py-10">
                        <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(201,151,43,0.20),transparent_35%),linear-gradient(315deg,rgba(255,255,255,0.12),transparent_30%)]"></div>
                        <div class="relative flex min-h-[300px] flex-col justify-between">
                            <div class="flex items-center justify-between">
                                <div class="rounded-2xl bg-white p-4 shadow-xl">
                                    <img src="{{ asset('images/ady-logo.png') }}" alt="ADYSURVE LTD logo" width="96" height="96" class="h-16 w-16 object-contain">
                                </div>
                                <span class="rounded-full border border-primary/50 bg-primary/10 px-4 py-2 text-xs font-extrabold uppercase tracking-widest text-primary-light">Since launch</span>
                            </div>

                            <div>
                                <h3 class="font-display text-2xl font-extrabold leading-tight sm:text-3xl">Integrated technology, security and energy solutions.</h3>
                                <p class="mt-4 max-w-sm text-sm leading-7 text-white/70">Reliable systems for organizations that need better connectivity, stronger protection and sustainable growth.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-3 bg-white px-4 py-5 text-dark-deeper sm:grid-cols-3">
                        @foreach([
                            ['icon' => 'heroicon-o-wifi', 'label' => 'Networks'],
                            ['icon' => 'heroicon-o-video-camera', 'label' => 'CCTV'],
                            ['icon' => 'heroicon-o-sun', 'label' => 'Solar']
                        ] as $item)
                            <div class="rounded-lg border border-black/10 bg-light p-4 text-center">
                                <x-dynamic-component :component="$item['icon']" class="mx-auto h-7 w-7 text-primary-dark" />
                                <p class="mt-3 text-xs font-extrabold uppercase tracking-widest">{{ $item['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div>
                <p class="inline-flex items-center gap-2 text-sm font-extrabold text-primary">
                    <span class="h-2 w-2 rounded-full border-2 border-primary"></span>
                    About Us
                </p>
                <h2 class="mt-4 max-w-3xl font-display text-3xl font-extrabold leading-tight md:text-5xl">
                    Learn about the mission and values that drive us at <span class="rounded-md bg-primary/20 px-3 text-primary-light">ADYSURVE</span>
                </h2>
                <p class="mt-5 max-w-2xl leading-8 text-white/70">
                    ADYSURVE LTD is a forward-thinking technology and engineering company committed to delivering reliable IT infrastructure, smart security systems, renewable energy solutions, and digital communication services for businesses, institutions, and individuals.
                </p>

                <div x-data="{ tab: 'mission' }" class="mt-8">
                    <div class="flex flex-wrap gap-8 border-b border-white/15">
                        <button type="button" @click="tab = 'mission'" class="pb-4 font-extrabold transition" :class="tab === 'mission' ? 'border-b-2 border-primary text-white' : 'text-white/55 hover:text-white'">Our Mission</button>
                        <button type="button" @click="tab = 'values'" class="pb-4 font-extrabold transition" :class="tab === 'values' ? 'border-b-2 border-primary text-white' : 'text-white/55 hover:text-white'">Our Values</button>
                    </div>

                    <div class="mt-7">
                        <div x-show="tab === 'mission'">
                            <p class="max-w-2xl leading-8 text-white/74">
                                Founded with a vision to bridge the gap between technology, security, and sustainable energy, ADYSURVE LTD combines technical expertise, innovation, and customer-focused service to deliver solutions that meet international standards and industry best practices.
                            </p>
                            <div class="mt-6 grid gap-4">
                                @foreach(['Empower businesses and individuals to operate more efficiently', 'Enhance security, productivity and long-term growth', 'Support sustainable energy adoption with dependable systems'] as $item)
                                    <div class="flex items-center gap-3 font-bold text-white/90"><x-heroicon-s-check-circle class="h-5 w-5 text-primary" />{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div x-show="tab === 'values'" x-cloak>
                            <p class="max-w-2xl leading-8 text-white/74">
                                We help clients stay connected, protected, and future-ready through smart technology solutions that create lasting value, from network infrastructure and CCTV surveillance to solar energy, IT training, graphic design and media communication.
                            </p>
                            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                                @foreach(['Experienced professionals', 'Reliable and scalable solutions', 'Customer-focused delivery', 'Commitment to innovation', 'Energy-efficient systems', 'End-to-end technical support'] as $item)
                                    <div class="flex items-center gap-3 font-bold text-white/90"><x-heroicon-s-check-circle class="h-5 w-5 text-primary" />{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="mt-9 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-extrabold text-dark-deeper shadow-xl shadow-primary/20 transition hover:bg-primary-light">
                    More About Us
                    <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                </a>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white py-16 md:py-28">
        <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-light to-white"></div>
        <div class="container-page relative">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="inline-flex items-center gap-2 text-sm font-extrabold uppercase tracking-widest text-primary">
                        <x-heroicon-o-academic-cap class="h-5 w-5" />
                        Megabyte Academy
                    </p>
                    <h2 class="mt-4 max-w-3xl font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">
                        Practical training programs from a training arm of <span class="text-primary-dark">ADYSURVE LTD</span>
                    </h2>
                </div>
                <div class="lg:pb-2">
                    <p class="max-w-2xl leading-8 text-dark/68">Megabyte Academy helps beginners, professionals, entrepreneurs, and corporate teams build hands-on skills across IT, security, renewable energy, and digital media.</p>
                    <a href="{{ route('academy.network-security') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-dark-deeper px-6 py-3 text-sm font-extrabold text-white transition hover:bg-primary hover:text-dark-deeper">
                        Explore Training Programs
                        <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:mt-14 lg:grid-cols-5">
                @foreach([
                    [
                        'title' => 'Network & Security',
                        'duration' => '6 Months',
                        'snippet' => 'Build practical skills in IT infrastructure, networking, cybersecurity, support, and career readiness.',
                        'route' => route('academy.network-security'),
                        'icon' => 'heroicon-o-shield-check',
                    ],
                    [
                        'title' => 'CCTV Installation',
                        'duration' => '3 Months',
                        'snippet' => 'Master surveillance installation, DVR/NVR setup, remote monitoring, maintenance, and troubleshooting.',
                        'route' => route('academy.cctv-security'),
                        'icon' => 'heroicon-o-video-camera',
                    ],
                    [
                        'title' => 'Solar Renewable Energy',
                        'duration' => '1 Month',
                        'snippet' => 'Learn solar system design, installation, testing, maintenance, and renewable energy business basics.',
                        'route' => route('academy.solar-renewable-energy'),
                        'icon' => 'heroicon-o-sun',
                    ],
                    [
                        'title' => 'IT Essentials',
                        'duration' => '3 Months',
                        'snippet' => 'Start with computer operations, internet skills, Microsoft Office, digital literacy, and IT support.',
                        'route' => route('academy.it-essentials'),
                        'icon' => 'heroicon-o-computer-desktop',
                    ],
                    [
                        'title' => 'Graphic Design & Media',
                        'duration' => '3 Months',
                        'snippet' => 'Develop creative design, branding, social media content, portfolio, and freelance-ready skills.',
                        'route' => route('academy.graphic-design-media'),
                        'icon' => 'heroicon-o-paint-brush',
                    ],
                ] as $program)
                    <article class="group relative flex min-h-0 flex-col overflow-hidden rounded-lg border border-black/10 bg-light p-5 shadow-sm transition hover:-translate-y-2 hover:bg-dark-deeper hover:text-white hover:shadow-2xl hover:shadow-black/12 sm:min-h-[330px] sm:p-6">
                        <div class="absolute right-0 top-0 h-16 w-16 rounded-bl-[2rem] bg-white transition group-hover:bg-primary/15"></div>
                        <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-primary-dark shadow-sm transition group-hover:bg-primary group-hover:text-dark-deeper">
                            <x-dynamic-component :component="$program['icon']" class="h-8 w-8" />
                        </div>
                        <div class="relative mt-7">
                            <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-extrabold uppercase tracking-widest text-primary-dark transition group-hover:bg-white/10 group-hover:text-primary-light">{{ $program['duration'] }}</span>
                            <h3 class="mt-4 font-display text-xl font-extrabold leading-tight text-dark-deeper transition group-hover:text-white">{{ $program['title'] }}</h3>
                            <p class="mt-4 text-sm leading-7 text-dark/65 transition group-hover:text-white/70">{{ $program['snippet'] }}</p>
                        </div>
                        <a href="{{ $program['route'] }}" class="relative mt-auto inline-flex items-center gap-2 pt-7 text-sm font-extrabold text-primary-dark transition group-hover:text-primary-light">
                            View Program
                            <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pb-16 pt-10 md:pb-28 md:pt-14">
        <div class="container-page">
            <x-ui.section-header eyebrow="Portfolio" title="Featured projects" />
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach($featuredProjects as $project)
                    <x-ui.project-card :project="$project" />
                @endforeach
            </div>
            <div class="mt-10 text-center"><a href="{{ route('projects') }}" class="rounded-full border border-dark px-7 py-4 font-bold hover:border-primary hover:text-primary">View All Projects</a></div>
        </div>
    </section>
    <section class="bg-light py-16 md:py-28">
        <div class="container-page">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Insights</p>
                    <h2 class="mt-3 max-w-3xl font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">Latest ideas for safer, smarter operations</h2>
                    <p class="mt-5 max-w-2xl leading-8 text-dark/65">Practical guidance on IT infrastructure, CCTV surveillance, solar energy, digital skills, and secure business technology.</p>
                </div>
                <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 rounded-full border border-dark-deeper px-6 py-3 text-sm font-extrabold text-dark-deeper transition hover:border-primary hover:text-primary-dark">
                    View Blog
                    <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                </a>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @forelse($latestPosts as $post)
                    <x-ui.blog-card :post="$post" />
                @empty
                    <div class="rounded-lg border border-black/10 bg-white p-8 text-dark/65 md:col-span-3">
                        Blog posts will appear here once they are published from the admin dashboard.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="bg-dark-deeper py-16 text-white md:py-28" x-data="{ active: 0 }">
        <div class="container-page">
            <x-ui.section-header eyebrow="Testimonials" title="What clients say" theme="dark" />
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach($testimonials as $testimonial)
                    <article class="rounded-lg border border-white/10 bg-white/5 p-6">
                        <div class="flex text-primary">@for($i = 0; $i < $testimonial->rating; $i++) <x-heroicon-s-star class="h-5 w-5" /> @endfor</div>
                        <p class="mt-5 leading-8 text-white/80">{{ $testimonial->content }}</p>
                        <h3 class="mt-6 font-display text-lg">{{ $testimonial->client_name }}</h3>
                        <p class="text-sm text-white/60">{{ $testimonial->client_company }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-primary py-16 text-dark-deeper">
        <div class="container-page flex flex-col items-stretch justify-between gap-6 md:flex-row md:items-center">
            <h2 class="font-display text-3xl font-extrabold md:text-5xl">Ready to book your free consultation?</h2>
            <a href="{{ route('contact') }}#free-consultation" class="rounded-full bg-dark-deeper px-7 py-4 text-center font-bold text-white">Book Free Consultation</a>
        </div>
    </section>
</x-layout.app>

