<x-layout.app :title="$metaTitle" :description="$metaDescription">
    <x-ui.page-hero title="Contact ADYSURVE LTD" subtitle="Request a consultation, quote, support visit, or project conversation." />
    <section id="free-consultation" class="scroll-mt-24 bg-light py-16 md:py-24">
        <div class="container-page grid gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-start">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">Free Consultation</p>
                <h2 class="mt-3 max-w-3xl font-display text-3xl font-extrabold leading-tight text-dark-deeper md:text-5xl">Book a free consultation with ADYSURVE LTD.</h2>
                <p class="mt-5 max-w-2xl leading-8 text-dark/68">Choose a preferred date, time slot, and consultation mode. Our team will review your request and confirm availability shortly.</p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach([
                        ['icon' => 'heroicon-o-calendar-days', 'title' => 'Pick a Date', 'text' => 'Select a weekday that works for your schedule.'],
                        ['icon' => 'heroicon-o-clock', 'title' => 'Choose a Time', 'text' => 'Available slots run during business hours.'],
                        ['icon' => 'heroicon-o-chat-bubble-left-right', 'title' => 'Select Mode', 'text' => 'Phone, WhatsApp, video call, or office visit.'],
                        ['icon' => 'heroicon-o-check-circle', 'title' => 'Get Confirmation', 'text' => 'Our team confirms the appointment after review.'],
                    ] as $item)
                        <div class="rounded-lg border border-black/10 bg-white p-5 shadow-sm">
                            <x-dynamic-component :component="$item['icon']" class="h-8 w-8 text-primary-dark" />
                            <h3 class="mt-4 font-display text-lg font-extrabold text-dark-deeper">{{ $item['title'] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-dark/65">{{ $item['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <form method="POST" action="{{ route('consultation.store') }}" class="rounded-2xl border border-black/10 bg-white p-5 shadow-2xl shadow-black/8 sm:p-8">
                @csrf
                @if(session('booking_status'))
                    <x-ui.alert class="mb-6">{{ session('booking_status') }}</x-ui.alert>
                @endif
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">

                <div class="grid gap-5 md:grid-cols-2">
                    <label class="grid gap-2 text-sm font-bold">Name<input name="name" value="{{ old('name') }}" required class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Email<input name="email" type="email" value="{{ old('email') }}" required class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Phone<input name="phone" value="{{ old('phone') }}" class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Service or Training
                        <select name="service_interest" class="rounded-lg border-gray-300">
                            <option value="">Select service or training</option>
                            @foreach($serviceOptions as $option)
                                <option value="{{ $option }}" @selected(old('service_interest', $selectedService) === $option)>{{ $option }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="grid gap-2 text-sm font-bold">Preferred Date<input name="preferred_date" type="date" min="{{ now()->toDateString() }}" value="{{ old('preferred_date') }}" required class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Meeting Mode
                        <select name="meeting_mode" required class="rounded-lg border-gray-300">
                            @foreach($consultationModes as $mode)
                                <option value="{{ $mode }}" @selected(old('meeting_mode') === $mode)>{{ $mode }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="mt-6">
                    <p class="text-sm font-bold">Preferred Time</p>
                    <div class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-4">
                        @foreach($consultationSlots as $slot)
                            <label class="cursor-pointer">
                                <input type="radio" name="preferred_time" value="{{ $slot['value'] }}" required class="peer sr-only" @checked(old('preferred_time') === $slot['value'])>
                                <span class="block rounded-lg border border-black/10 bg-light px-3 py-3 text-center text-sm font-extrabold text-dark-deeper transition peer-checked:border-primary peer-checked:bg-primary peer-checked:text-dark-deeper">{{ $slot['label'] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <label class="mt-5 grid gap-2 text-sm font-bold">Project Notes<textarea name="notes" rows="5" class="rounded-lg border-gray-300" placeholder="Tell us what you would like to discuss.">{{ old('notes') }}</textarea></label>

                @if($errors->hasAny(['preferred_date', 'preferred_time', 'meeting_mode']))
                    <div class="mt-5 rounded-lg bg-red-50 p-4 text-sm text-red-700">{{ $errors->first() }}</div>
                @endif

                <button class="mt-6 w-full rounded-full bg-primary px-7 py-4 font-bold text-dark-deeper">Book Free Consultation</button>
            </form>
        </div>
    </section>

    <section class="py-16 md:py-28">
        <div class="container-page grid gap-8 lg:grid-cols-[1fr_420px] lg:gap-12">
            <form method="POST" action="{{ route('contact.store') }}" class="rounded-lg border border-black/10 bg-white p-5 shadow-sm sm:p-8">
                @csrf
                @if(session('status'))
                    <x-ui.alert class="mb-6">{{ session('status') }}</x-ui.alert>
                @endif
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">
                <div class="grid gap-5 md:grid-cols-2">
                    <label class="grid gap-2 text-sm font-bold">Name<input name="name" value="{{ old('name') }}" required class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Email<input name="email" type="email" value="{{ old('email') }}" required class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Phone<input name="phone" value="{{ old('phone') }}" class="rounded-lg border-gray-300"></label>
                    <label class="grid gap-2 text-sm font-bold">Service
                        <select name="service_interest" class="rounded-lg border-gray-300">
                            <option value="">Select service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->title }}" @selected(old('service_interest', request('service')) === $service->slug)>{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <label class="mt-5 grid gap-2 text-sm font-bold">Subject<input name="subject" value="{{ old('subject') }}" required class="rounded-lg border-gray-300"></label>
                <label class="mt-5 grid gap-2 text-sm font-bold">Message<textarea name="message" rows="6" required class="rounded-lg border-gray-300">{{ old('message') }}</textarea></label>
                @if($errors->any())
                    <div class="mt-5 rounded-lg bg-red-50 p-4 text-sm text-red-700">{{ $errors->first() }}</div>
                @endif
                <button class="mt-6 w-full rounded-full bg-primary px-7 py-4 font-bold text-dark-deeper sm:w-auto">Submit Message</button>
            </form>
            <aside class="space-y-5">
                @foreach([['Address', $settings('site_address')], ['Phone', $settings('site_phone')], ['Email', $settings('site_email')], ['WhatsApp', $settings('site_whatsapp')], ['Business Hours', $settings('business_hours', 'Mon-Fri, 8:00-17:00')]] as [$label, $value])
                    <div class="rounded-lg bg-light p-5 sm:p-6">
                        <h2 class="font-display text-xl font-bold">{{ $label }}</h2>
                        <p class="mt-2 text-[var(--color-text-muted)]">{{ $value }}</p>
                    </div>
                @endforeach
                <div class="rounded-lg bg-dark-deeper p-6 text-white">
                    <h2 class="font-display text-xl font-bold">Connect With Us</h2>
                    <p class="mt-2 text-sm leading-7 text-white/70">Follow ADYSURVE LTD or reach us directly through our social channels.</p>
                    <x-ui.social-links class="mt-5 text-white" />
                </div>
                <div class="aspect-video overflow-hidden rounded-lg bg-light">
                    <iframe title="ADYSURVE map placeholder" src="https://maps.google.com/maps?q=Nigeria&t=&z=5&ie=UTF8&iwloc=&output=embed" class="h-full w-full" loading="lazy"></iframe>
                </div>
            </aside>
        </div>
    </section>
</x-layout.app>
