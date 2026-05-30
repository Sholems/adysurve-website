@php
    $setting = fn (string $key, ?string $default = null) => $siteSettings[$key] ?? $default;
    $phone = $setting('site_phone', '+234 XXX XXX XXXX');
    $email = $setting('site_email', 'info@adysurve.com');
    $address = $setting('site_address', 'Nigeria');
    $businessHours = $setting('business_hours', 'Mon-Fri, 8:00-17:00');
@endphp
<footer class="bg-dark-deeper text-white">
    <div class="container-page grid gap-9 py-12 sm:py-16 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <a href="{{ route('home') }}" class="inline-flex max-w-full items-center gap-3" aria-label="ADYSURVE LTD home">
                <img src="{{ asset('images/ady-logo.png') }}" alt="" width="90" height="84" class="h-12 w-auto shrink-0 object-contain sm:h-14">
                <span class="min-w-0 leading-none">
                    <span class="block font-display text-xl font-extrabold tracking-normal text-white sm:text-2xl">ADYSURVE LTD</span>
                    <span class="mt-2 block text-[10px] font-bold uppercase tracking-widest text-primary">Smart Solutions for a Secure Future</span>
                </span>
            </a>
            <p class="mt-4 text-sm leading-7 text-white/70">ADYSURVE LTD is a forward-thinking technology and engineering company delivering reliable IT infrastructure, smart security systems, renewable energy solutions, and digital communication services.</p>
        </div>
        <div>
            <h3 class="font-display text-lg">Services</h3>
            <div class="mt-4 grid gap-3 text-sm text-white/70">
                @foreach($layoutServices as $service)
                    <a href="{{ route('services.show', $service->slug) }}" class="hover:text-primary">{{ $service->title }}</a>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="font-display text-lg">Quick Links</h3>
            <div class="mt-4 grid gap-3 text-sm text-white/70">
                <a href="{{ route('about') }}" class="hover:text-primary">About</a>
                <a href="{{ route('projects') }}" class="hover:text-primary">Projects</a>
                <a href="{{ route('academy.network-security') }}" class="hover:text-primary">Megabyte Academy</a>
                <a href="{{ route('academy.cctv-security') }}" class="hover:text-primary">CCTV Training</a>
                <a href="{{ route('academy.solar-renewable-energy') }}" class="hover:text-primary">Solar Training</a>
                <a href="{{ route('academy.it-essentials') }}" class="hover:text-primary">IT Essentials Training</a>
                <a href="{{ route('academy.graphic-design-media') }}" class="hover:text-primary">Graphic Design Training</a>
                <a href="{{ route('blog') }}" class="hover:text-primary">Blog</a>
                <a href="{{ route('contact') }}" class="hover:text-primary">Contact</a>
            </div>
        </div>
        <div>
            <h3 class="font-display text-lg">Contact</h3>
            <div class="mt-4 grid gap-4 text-sm text-white/70">
                <div class="flex gap-3">
                    <x-heroicon-o-map-pin class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                    <span>{{ $address }}</span>
                </div>
                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="flex min-w-0 gap-3 hover:text-primary">
                    <x-heroicon-o-phone class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                    <span class="break-words">{{ $phone }}</span>
                </a>
                <a href="mailto:{{ $email }}" class="flex min-w-0 gap-3 hover:text-primary">
                    <x-heroicon-o-envelope class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                    <span class="break-all">{{ $email }}</span>
                </a>
                <div class="flex gap-3">
                    <x-heroicon-o-clock class="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                    <span>{{ $businessHours }}</span>
                </div>
            </div>
            <x-ui.social-links class="mt-6 text-white" />
        </div>
    </div>
    <div class="border-t border-white/10 py-5 text-sm text-white/60">
        <div class="container-page flex flex-col items-center justify-between gap-4 text-center md:flex-row md:text-left">
            <p>Copyright {{ date('Y') }} ADYSURVE LTD. All rights reserved.</p>
            <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
                <a href="{{ route('privacy') }}" class="hover:text-primary">Privacy Policy</a>
                <span class="text-white/25">/</span>
                <a href="{{ route('terms') }}" class="hover:text-primary">Terms</a>
                <span class="hidden text-white/25 md:inline">/</span>
                <span>Developed by <a href="https://getboldideas.com" target="_blank" rel="noopener noreferrer" class="font-bold text-primary hover:text-primary-light">Bold Ideas</a></span>
            </div>
        </div>
    </div>
</footer>
