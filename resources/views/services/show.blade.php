@php
    $serviceSchema = [
        '@type' => 'Service',
        'name' => $service->title,
        'description' => $metaDescription,
        'provider' => [
            '@type' => 'Organization',
            'name' => 'ADYSURVE LTD',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Nigeria',
        ],
        'url' => request()->url(),
    ];
@endphp

<x-layout.app :title="$metaTitle" :description="$metaDescription" :schema="$serviceSchema">
    @php
        $serviceDetails = [
            'networks-security' => [
                'eyebrow' => 'IT Infrastructure & Security',
                'promise' => 'Reliable connectivity, stronger protection, and responsive technical support for modern organizations.',
                'features' => ['Network design & deployment', 'Cybersecurity hardening', 'Router, switch & firewall setup', 'Wireless coverage planning', 'Server & support operations', 'Monitoring and optimization'],
                'outcomes' => ['Reduced downtime', 'Improved data protection', 'Better team productivity', 'Clearer support workflow'],
                'audience' => ['Businesses and offices', 'Schools and institutions', 'Estates and facilities', 'Retail and service teams'],
                'icon' => 'heroicon-o-shield-check',
            ],
            'cctv-surveillance' => [
                'eyebrow' => 'CCTV & Surveillance Security',
                'promise' => 'Clear, dependable, and easy-to-manage surveillance systems for homes, facilities, and businesses.',
                'features' => ['Security assessment', 'Camera placement planning', 'DVR/NVR configuration', 'Remote monitoring setup', 'Recording and storage planning', 'Maintenance and upgrades'],
                'outcomes' => ['Better visibility', 'Improved asset protection', 'Faster incident review', 'Peace of mind'],
                'audience' => ['Homes and estates', 'Offices and warehouses', 'Schools and churches', 'Retail outlets and event spaces'],
                'icon' => 'heroicon-o-video-camera',
            ],
            'solar-energy' => [
                'eyebrow' => 'Solar Renewable Energy',
                'promise' => 'Practical solar power systems designed for reliable backup, lower energy costs, and long-term use.',
                'features' => ['Energy audit and load assessment', 'Solar panel layout', 'Inverter and battery sizing', 'Installation and protection systems', 'Performance testing', 'Maintenance guidance'],
                'outcomes' => ['Cleaner power', 'Reduced generator dependence', 'Lower operating cost', 'Improved energy independence'],
                'audience' => ['Homes and apartments', 'Offices and shops', 'Schools and health facilities', 'Organizations needing stable power'],
                'icon' => 'heroicon-o-sun',
            ],
            'graphic-design-media' => [
                'eyebrow' => 'Graphic Design & Media Communication',
                'promise' => 'Brand-focused visuals and digital communication assets that help organizations look clear, trusted, and professional.',
                'features' => ['Brand identity design', 'Social media graphics', 'Flyers and campaign assets', 'Business presentations', 'Marketing materials', 'Creative media solutions'],
                'outcomes' => ['Stronger brand presence', 'Clearer communication', 'More polished campaigns', 'Better audience engagement'],
                'audience' => ['Startups and SMEs', 'Schools and churches', 'Events and campaigns', 'Professionals and organizations'],
                'icon' => 'heroicon-o-paint-brush',
            ],
            'it-training' => [
                'eyebrow' => 'IT Training',
                'promise' => 'Beginner-friendly practical training that helps learners build digital confidence and useful workplace skills.',
                'features' => ['Computer fundamentals', 'Internet and digital literacy', 'Productivity tools', 'Basic networking', 'Cybersecurity awareness', 'Practical support skills'],
                'outcomes' => ['Improved digital confidence', 'Better office productivity', 'Stronger IT foundation', 'Readiness for advanced training'],
                'audience' => ['Students and graduates', 'Job seekers', 'Office staff', 'Business owners'],
                'icon' => 'heroicon-o-academic-cap',
            ],
        ];
        $details = $serviceDetails[$service->slug] ?? [
            'eyebrow' => 'Professional Service',
            'promise' => $service->short_description,
            'features' => ['Needs assessment', 'Professional implementation', 'Testing and handover', 'After-service support'],
            'outcomes' => ['Better reliability', 'Improved operations', 'Professional guidance', 'Long-term value'],
            'audience' => ['Businesses', 'Institutions', 'Individuals', 'Organizations'],
            'icon' => $service->icon ?: 'heroicon-o-briefcase',
        ];
    @endphp

    <section class="relative overflow-hidden bg-dark-deeper py-16 text-white md:py-32">
        <img src="{{ $service->featured_image_url }}" alt="{{ $service->title }}" width="1600" height="950" class="absolute inset-0 h-full w-full object-cover opacity-22">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/78 to-black/45"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_25%,rgba(201,151,43,0.22),transparent_32%)]"></div>
        <div class="container-page relative grid gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <div>
                <p class="inline-flex max-w-full items-center gap-2 rounded-full border border-primary/40 bg-primary/10 px-3 py-2 text-[10px] font-extrabold uppercase tracking-[0.12em] text-primary-light sm:px-4 sm:text-xs sm:tracking-widest">
                    <x-dynamic-component :component="$details['icon']" class="h-5 w-5" />
                    <span class="truncate">{{ $details['eyebrow'] }}</span>
                </p>
                <h1 class="mt-6 max-w-5xl font-display text-3xl font-extrabold leading-tight md:text-6xl">{{ $service->title }}</h1>
                <p class="mt-6 max-w-3xl text-base font-medium leading-8 text-white/78 sm:text-lg md:text-xl md:leading-9">{{ $details['promise'] }}</p>
                <div class="mt-8 grid gap-3 sm:flex sm:flex-wrap sm:gap-4">
                    <a href="{{ route('contact', ['service' => $service->slug]) }}" class="rounded-full bg-primary px-7 py-4 text-center text-sm font-extrabold text-dark-deeper shadow-xl shadow-primary/20 transition hover:bg-primary-light">Request This Service</a>
                    <a href="#details" class="rounded-full border border-white/35 px-7 py-4 text-center text-sm font-extrabold text-white transition hover:border-primary hover:text-primary-light">See Details</a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-[2rem] bg-primary/10 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-lg border border-white/15 bg-white/[0.08] p-5 shadow-2xl shadow-black/35 backdrop-blur">
                    <img src="{{ $service->featured_image_url }}" alt="{{ $service->title }} service by ADYSURVE LTD" width="1100" height="900" class="aspect-[4/3] w-full rounded-lg object-cover">
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach($details['outcomes'] as $outcome)
                            <div class="rounded-lg border border-white/12 bg-black/30 p-4">
                                <x-heroicon-s-check-circle class="h-5 w-5 text-primary" />
                                <p class="mt-2 text-sm font-bold text-white/88">{{ $outcome }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="details" class="bg-white py-16 md:py-28">
        <div class="container-page grid gap-12 lg:grid-cols-[minmax(0,1fr)_380px]">
            <div>
                <div class="prose prose-lg max-w-none prose-headings:font-display prose-headings:text-dark-deeper prose-p:leading-8 prose-p:text-dark/70">
                    {!! $service->full_description !!}
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-2">
                    <div class="rounded-lg border border-black/10 bg-light p-7">
                        <h2 class="font-display text-2xl font-extrabold text-dark-deeper">What's Included</h2>
                        <div class="mt-6 grid gap-4">
                            @foreach($details['features'] as $feature)
                                <div class="flex gap-3">
                                    <x-heroicon-o-check-circle class="mt-0.5 h-5 w-5 shrink-0 text-primary-dark" />
                                    <span class="font-bold leading-7 text-dark/78">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-lg border border-black/10 bg-dark-deeper p-7 text-white">
                        <h2 class="font-display text-2xl font-extrabold">Ideal For</h2>
                        <div class="mt-6 grid gap-4">
                            @foreach($details['audience'] as $audience)
                                <div class="flex gap-3">
                                    <x-heroicon-o-user-group class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                                    <span class="font-bold leading-7 text-white/82">{{ $audience }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-12 rounded-lg border border-black/10 bg-white p-7 shadow-sm">
                    <h2 class="font-display text-3xl font-extrabold text-dark-deeper">Our Delivery Process</h2>
                    <div class="mt-8 grid gap-5 md:grid-cols-4">
                        @foreach([
                            ['Discovery', 'We understand your goals, environment, risks, budget, and operational needs.'],
                            ['Planning', 'We recommend the right structure, tools, equipment, and implementation path.'],
                            ['Execution', 'Our team installs, configures, tests, and documents the delivered solution.'],
                            ['Support', 'We guide handover, usage, maintenance, and future improvement options.'],
                        ] as [$step, $text])
                            <div class="rounded-lg bg-light p-5">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-primary font-display text-sm font-extrabold text-dark-deeper">{{ $loop->iteration }}</span>
                                <h3 class="mt-5 font-display text-lg font-extrabold text-dark-deeper">{{ $step }}</h3>
                                <p class="mt-3 text-sm leading-7 text-dark/64">{{ $text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <aside class="space-y-6 lg:sticky lg:top-28 lg:h-fit">
                <div class="rounded-lg bg-dark-deeper p-8 text-white shadow-2xl shadow-black/10">
                    <x-dynamic-component :component="$details['icon']" class="h-12 w-12 text-primary" />
                    <h2 class="mt-5 font-display text-2xl font-extrabold">Request this service</h2>
                    <p class="mt-3 leading-7 text-white/70">Tell us what you need and our team will guide the next step with practical recommendations.</p>
                    <a href="{{ route('contact', ['service' => $service->slug]) }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-extrabold text-dark-deeper transition hover:bg-primary-light">
                        Contact Us
                        <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                    </a>
                </div>

                <div class="rounded-lg border border-black/10 bg-light p-7">
                    <h2 class="font-display text-xl font-extrabold text-dark-deeper">Why ADYSURVE LTD?</h2>
                    <div class="mt-5 grid gap-4">
                        @foreach(['Professional planning', 'Practical implementation', 'Clear communication', 'Reliable after-service support'] as $item)
                            <div class="flex gap-3">
                                <x-heroicon-s-star class="h-5 w-5 shrink-0 text-primary-dark" />
                                <span class="text-sm font-bold text-dark/75">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </section>

    @if($relatedServices->isNotEmpty())
        <section class="bg-light py-20 md:py-28">
            <div class="container-page">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Explore More</p>
                        <h2 class="mt-3 font-display text-4xl font-extrabold text-dark-deeper">Related services</h2>
                    </div>
                    <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full border border-dark-deeper px-6 py-3 text-sm font-extrabold text-dark-deeper transition hover:border-primary hover:text-primary-dark">
                        View All Services
                        <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                    </a>
                </div>
                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    @foreach($relatedServices as $relatedService)
                        <article class="group rounded-lg border border-black/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                            @if($relatedService->icon)<x-dynamic-component :component="$relatedService->icon" class="h-10 w-10 text-primary-dark" />@endif
                            <h3 class="mt-5 font-display text-xl font-extrabold text-dark-deeper">{{ $relatedService->title }}</h3>
                            <p class="mt-4 text-sm leading-7 text-dark/65">{{ \Illuminate\Support\Str::limit($relatedService->short_description, 130) }}</p>
                            <a href="{{ route('services.show', $relatedService->slug) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-primary-dark">
                                View Service
                                <x-heroicon-o-arrow-up-right class="h-4 w-4" />
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($relatedProjects->isNotEmpty())
        <section class="bg-white py-20">
            <div class="container-page">
                <x-ui.section-header title="Related Projects" />
                <div class="mt-12 grid gap-8 md:grid-cols-3">
                    @foreach($relatedProjects as $project)
                        <x-ui.project-card :project="$project" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layout.app>
