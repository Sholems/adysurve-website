<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <x-ui.page-hero
        title="About Us"
        subtitle="ADYSURVE LTD — Smart Solutions for a Secure Future."
    />

    <section class="bg-white py-16 md:py-28">
        <div class="container-page grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
            <div class="grid gap-5">
                <div class="overflow-hidden rounded-2xl border border-black/10 bg-light p-3 shadow-xl">
                    <img src="https://images.pexels.com/photos/8853536/pexels-photo-8853536.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Solar technicians installing solar panels" width="1200" height="800" loading="lazy" class="aspect-[4/3] w-full rounded-xl object-cover">
                </div>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-5">
                    <div class="rounded-2xl bg-dark-deeper p-5 text-white sm:p-6">
                        <x-heroicon-o-shield-check class="h-10 w-10 text-primary" />
                        <p class="mt-4 font-display text-2xl font-extrabold">Secure</p>
                        <p class="mt-2 text-sm leading-6 text-white/70">Smart systems for safer operations.</p>
                    </div>
                    <div class="rounded-2xl bg-primary p-5 text-dark-deeper sm:p-6">
                        <x-heroicon-o-bolt class="h-10 w-10" />
                        <p class="mt-4 font-display text-2xl font-extrabold">Scalable</p>
                        <p class="mt-2 text-sm font-medium leading-6">Reliable solutions for long-term growth.</p>
                    </div>
                </div>
            </div>

            <article>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">About Us</p>
                <h2 class="mt-4 max-w-3xl font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">Forward-thinking technology and engineering solutions for modern organizations.</h2>
                <div class="mt-7 space-y-5 text-base leading-8 text-[var(--color-text-muted)] sm:text-lg sm:leading-9">
                    <p><strong class="text-dark-deeper">ADYSURVE LTD</strong> is a forward-thinking technology and engineering company committed to delivering reliable IT infrastructure, smart security systems, renewable energy solutions, and digital communication services for businesses, institutions, and individuals. We help organizations embrace modern technology with confidence by providing innovative, secure, and scalable solutions tailored to today&rsquo;s fast-changing digital world.</p>

                    <p>Founded with a vision to bridge the gap between technology, security, and sustainable energy, ADYSURVE LTD has grown into a trusted provider of integrated technology services. Our expertise spans across network infrastructure deployment, cybersecurity support, CCTV surveillance installation, solar renewable energy systems, IT training, graphic design, and media communication solutions.</p>

                    <p>At ADYSURVE LTD, we understand that modern businesses require more than just basic technology tools. They need dependable systems that improve productivity, enhance security, reduce operational costs, and support long-term growth. That is why we combine technical expertise, innovation, and customer-focused service to deliver solutions that meet international standards and industry best practices.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-light py-16 md:py-28">
        <div class="container-page">
            <x-ui.section-header eyebrow="What We Deliver" title="Our Core Services" subtitle="Reliable IT, security, renewable energy, training, design, and media communication services for businesses, institutions, and individuals." />

            <div class="mt-10 grid gap-6 md:mt-12 md:gap-8">
                <article class="grid overflow-hidden rounded-2xl border border-black/10 bg-white shadow-sm lg:grid-cols-[0.9fr_1.1fr]">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=85" alt="Network infrastructure and server room equipment" width="1200" height="800" loading="lazy" class="h-full min-h-80 w-full object-cover">
                    <div class="p-5 sm:p-8 md:p-10">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary"><x-heroicon-o-server-stack class="h-8 w-8" /></div>
                        <h3 class="mt-6 font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">IT Infrastructure, Networking & Security</h3>
                        <p class="mt-4 leading-8 text-[var(--color-text-muted)]">We provide professional IT infrastructure setup, network design, system integration, troubleshooting, and technical support services for businesses, schools, offices, and organizations. Our networking and security solutions are designed to improve connectivity, data protection, operational efficiency, and business continuity.</p>
                        <p class="mt-6 font-bold text-dark-deeper">Our IT services include:</p>
                        <ul class="mt-4 grid gap-3 text-sm font-semibold text-dark sm:grid-cols-2">
                            @foreach(['Network installation and configuration', 'Server and system support', 'Cybersecurity solutions', 'Wireless network deployment', 'IT maintenance and support', 'Infrastructure monitoring and optimization'] as $item)
                                <li class="flex gap-3"><x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-primary" /><span>{{ $item }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </article>

                <article class="grid overflow-hidden rounded-2xl border border-black/10 bg-white shadow-sm lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="p-5 sm:p-8 md:p-10">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary"><x-heroicon-o-video-camera class="h-8 w-8" /></div>
                        <h3 class="mt-6 font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">CCTV Installation & Surveillance Security</h3>
                        <p class="mt-4 leading-8 text-[var(--color-text-muted)]">Security is essential for every modern environment. ADYSURVE LTD delivers advanced CCTV installation and surveillance security systems that help homes, offices, schools, warehouses, and commercial facilities monitor activities and protect valuable assets.</p>
                        <p class="mt-6 font-bold text-dark-deeper">Our surveillance solutions include:</p>
                        <ul class="mt-4 grid gap-3 text-sm font-semibold text-dark sm:grid-cols-2">
                            @foreach(['HD and IP CCTV camera installation', 'Remote monitoring systems', 'Access control systems', 'Video recording and storage solutions', 'Security system maintenance and upgrades'] as $item)
                                <li class="flex gap-3"><x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-primary" /><span>{{ $item }}</span></li>
                            @endforeach
                        </ul>
                        <p class="mt-6 leading-8 text-[var(--color-text-muted)]">We deploy smart surveillance technologies that enhance safety, improve monitoring efficiency, and provide peace of mind.</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=85" alt="CCTV security camera installed on a building" width="1200" height="800" loading="lazy" class="h-full min-h-80 w-full object-cover">
                </article>

                <article class="grid overflow-hidden rounded-2xl border border-black/10 bg-white shadow-sm lg:grid-cols-[0.9fr_1.1fr]">
                    <img src="https://images.pexels.com/photos/8853502/pexels-photo-8853502.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Solar technician installing a solar panel" width="1200" height="800" loading="lazy" class="h-full min-h-80 w-full object-cover">
                    <div class="p-5 sm:p-8 md:p-10">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary"><x-heroicon-o-sun class="h-8 w-8" /></div>
                        <h3 class="mt-6 font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">Solar Renewable Energy Design & Installation</h3>
                        <p class="mt-4 leading-8 text-[var(--color-text-muted)]">As energy demands continue to rise, we provide sustainable solar energy solutions that help individuals and organizations reduce electricity costs while promoting clean energy adoption. Our solar renewable energy systems are designed for reliability, efficiency, and long-term performance.</p>
                        <p class="mt-6 font-bold text-dark-deeper">Our renewable energy services include:</p>
                        <ul class="mt-4 grid gap-3 text-sm font-semibold text-dark sm:grid-cols-2">
                            @foreach(['Solar power system design', 'Solar panel installation', 'Inverter and battery setup', 'Energy backup solutions', 'Solar maintenance and consultation'] as $item)
                                <li class="flex gap-3"><x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-primary" /><span>{{ $item }}</span></li>
                            @endforeach
                        </ul>
                        <p class="mt-6 leading-8 text-[var(--color-text-muted)]">We are committed to supporting energy independence through environmentally friendly and cost-effective solar solutions.</p>
                    </div>
                </article>

                <div class="grid gap-8 lg:grid-cols-2">
                    <article class="overflow-hidden rounded-2xl border border-black/10 bg-white shadow-sm">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85" alt="Digital learning and IT training workspace" width="1200" height="700" loading="lazy" class="h-72 w-full object-cover">
                        <div class="p-5 sm:p-8">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary"><x-heroicon-o-academic-cap class="h-8 w-8" /></div>
                            <h3 class="mt-6 font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">IT Essentials Training for Beginners</h3>
                            <p class="mt-4 leading-8 text-[var(--color-text-muted)]">Technology education is at the heart of digital transformation. ADYSURVE LTD offers beginner-friendly IT training programs designed to equip students, professionals, entrepreneurs, and young learners with practical digital skills needed in today&rsquo;s technology-driven world.</p>
                            <p class="mt-6 font-bold text-dark-deeper">Our training programs focus on:</p>
                            <ul class="mt-4 grid gap-3 text-sm font-semibold text-dark sm:grid-cols-2">
                                @foreach(['Computer fundamentals', 'Internet and digital literacy', 'Basic networking concepts', 'Productivity tools', 'Introduction to cybersecurity', 'Practical IT support skills'] as $item)
                                    <li class="flex gap-3"><x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-primary" /><span>{{ $item }}</span></li>
                                @endforeach
                            </ul>
                            <p class="mt-6 leading-8 text-[var(--color-text-muted)]">We believe technology knowledge should be accessible, practical, and empowering.</p>
                        </div>
                    </article>

                    <article class="overflow-hidden rounded-2xl border border-black/10 bg-white shadow-sm">
                        <img src="https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=1200&q=85" alt="Creative design and media communication workspace" width="1200" height="700" loading="lazy" class="h-72 w-full object-cover">
                        <div class="p-5 sm:p-8">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary"><x-heroicon-o-paint-brush class="h-8 w-8" /></div>
                            <h3 class="mt-6 font-display text-2xl font-extrabold text-dark-deeper sm:text-3xl">Graphic Design & Media Communication</h3>
                            <p class="mt-4 leading-8 text-[var(--color-text-muted)]">Our creative team provides professional graphic design and media communication services that help businesses strengthen their brand identity and communicate effectively with their audience.</p>
                            <p class="mt-6 font-bold text-dark-deeper">Our design services include:</p>
                            <ul class="mt-4 grid gap-3 text-sm font-semibold text-dark sm:grid-cols-2">
                                @foreach(['Brand identity design', 'Logo and marketing materials', 'Social media graphics', 'Business presentations', 'Digital communication assets', 'Creative media solutions'] as $item)
                                    <li class="flex gap-3"><x-heroicon-o-check-circle class="h-5 w-5 shrink-0 text-primary" /><span>{{ $item }}</span></li>
                                @endforeach
                            </ul>
                            <p class="mt-6 leading-8 text-[var(--color-text-muted)]">We combine creativity with strategy to deliver designs that capture attention and support business growth.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark-deeper py-16 text-white md:py-28">
        <div class="container-page grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Why Choose ADYSURVE LTD?</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold leading-tight md:text-5xl">Professional delivery, reliable systems, and end-to-end technical support.</h2>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach(['Experienced and skilled professionals', 'Reliable and scalable technology solutions', 'Customer-focused service delivery', 'Commitment to innovation and quality', 'Sustainable and energy-efficient solutions', 'Affordable and professional services', 'End-to-end technical support'] as $reason)
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 font-bold text-white/85 shadow-xl"><span class="text-primary">✓</span> {{ $reason }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-16 md:py-28">
        <div class="container-page grid gap-6 md:grid-cols-3">
            <article class="rounded-2xl bg-light p-5 sm:p-8">
                <x-heroicon-o-rocket-launch class="h-10 w-10 text-primary" />
                <h2 class="mt-5 font-display text-3xl font-extrabold text-dark-deeper">Our Mission</h2>
                <p class="mt-4 leading-8 text-[var(--color-text-muted)]">To provide innovative technology, security, renewable energy, and digital communication solutions that empower businesses and individuals to operate more efficiently, securely, and sustainably.</p>
            </article>
            <article class="rounded-2xl bg-dark-deeper p-5 text-white sm:p-8">
                <x-heroicon-o-eye class="h-10 w-10 text-primary" />
                <h2 class="mt-5 font-display text-3xl font-extrabold">Our Vision</h2>
                <p class="mt-4 leading-8 text-white/75">To become a leading technology and engineering solutions company recognized for excellence, innovation, integrity, and customer satisfaction across Africa and beyond.</p>
            </article>
            <article class="rounded-2xl bg-primary p-5 text-dark-deeper sm:p-8">
                <x-heroicon-o-hand-raised class="h-10 w-10" />
                <h2 class="mt-5 font-display text-3xl font-extrabold">Our Commitment</h2>
                <p class="mt-4 leading-8 font-medium">At ADYSURVE LTD, we are committed to helping our clients stay connected, protected, and future-ready through smart technology solutions that create lasting value. Whether it is securing a facility, deploying a reliable network infrastructure, installing solar energy systems, or empowering beginners with IT knowledge, we approach every project with professionalism, precision, and dedication.</p>
            </article>
        </div>
        <div class="container-page mt-12">
            <div class="rounded-2xl border border-primary/30 bg-primary/10 p-5 text-center sm:p-8">
                <p class="font-display text-3xl font-extrabold text-dark-deeper">ADYSURVE LTD — <span class="text-primary-dark">Smart Solutions for a Secure Future.</span></p>
            </div>
        </div>
    </section>
</x-layout.app>
