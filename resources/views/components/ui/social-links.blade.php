@php
    $setting = fn (string $key, ?string $default = null) => $siteSettings[$key] ?? $default;
    $whatsapp = $setting('site_whatsapp');
    $socials = [
        ['label' => 'Facebook', 'url' => $setting('facebook_url'), 'icon' => 'facebook'],
        ['label' => 'Instagram', 'url' => $setting('instagram_url'), 'icon' => 'instagram'],
        ['label' => 'LinkedIn', 'url' => $setting('linkedin_url'), 'icon' => 'linkedin'],
        ['label' => 'X', 'url' => $setting('twitter_url'), 'icon' => 'x'],
        ['label' => 'YouTube', 'url' => $setting('youtube_url'), 'icon' => 'youtube'],
        ['label' => 'TikTok', 'url' => $setting('tiktok_url'), 'icon' => 'tiktok'],
    ];
    $visibleSocials = collect($socials)->filter(fn ($social) => filled($social['url']));
    $whatsappHref = $whatsapp ? 'https://wa.me/'.preg_replace('/\D+/', '', $whatsapp) : null;
@endphp

@if($visibleSocials->isNotEmpty() || $whatsappHref)
    <div {{ $attributes->class('flex flex-wrap gap-3') }}>
        @foreach($visibleSocials as $social)
            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}" class="flex h-10 w-10 items-center justify-center rounded-full border border-current/15 bg-current/5 transition hover:border-primary hover:bg-primary hover:text-dark-deeper">
                @switch($social['icon'])
                    @case('facebook')
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M14 8.5h2.2V5.1c-.4-.1-1.7-.2-3.2-.2-3.2 0-5.3 1.9-5.3 5.5v3.1H4.3v3.8h3.4V24h4.1v-6.7h3.2l.5-3.8h-3.7v-2.7c0-1.1.3-2.3 2.2-2.3Z"/></svg>
                        @break
                    @case('instagram')
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M7.8 2h8.4A5.8 5.8 0 0 1 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8A5.8 5.8 0 0 1 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2Zm0 2A3.8 3.8 0 0 0 4 7.8v8.4A3.8 3.8 0 0 0 7.8 20h8.4a3.8 3.8 0 0 0 3.8-3.8V7.8A3.8 3.8 0 0 0 16.2 4H7.8Zm8.8 2.1a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6ZM12 7.2a4.8 4.8 0 1 1 0 9.6 4.8 4.8 0 0 1 0-9.6Zm0 2a2.8 2.8 0 1 0 0 5.6 2.8 2.8 0 0 0 0-5.6Z"/></svg>
                        @break
                    @case('linkedin')
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5ZM.3 8h4.4v15H.3V8Zm7.3 0h4.2v2.1h.1c.6-1.1 2-2.4 4.2-2.4 4.5 0 5.3 3 5.3 6.8V23H17v-7.5c0-1.8 0-4.1-2.5-4.1s-2.9 2-2.9 4V23H7.6V8Z"/></svg>
                        @break
                    @case('youtube')
                        <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8ZM9.6 15.6V8.4L15.8 12l-6.2 3.6Z"/></svg>
                        @break
                    @case('tiktok')
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M16.6 1.7c.4 3.1 2.1 4.9 5.1 5.1v3.5c-1.8.2-3.4-.4-5-1.5v6.5c0 8.2-9 10.8-12.7 4.9-2.4-3.8-.9-10.5 6.8-10.8v3.7c-.6.1-1.2.2-1.8.5-1.7.8-2.6 2.4-2.1 4 .9 3.1 6.1 4 6.1-2V1.7h3.6Z"/></svg>
                        @break
                    @default
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M18.9 2H22l-6.8 7.8 8 12.2h-6.3l-4.9-7.2L6.4 22H3.2l7.3-8.4L2.8 2h6.4l4.4 6.6L18.9 2Zm-1.1 17.8h1.7L8.3 4.1H6.5l11.3 15.7Z"/></svg>
                @endswitch
            </a>
        @endforeach

        @if($whatsappHref)
            <a href="{{ $whatsappHref }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" class="flex h-10 w-10 items-center justify-center rounded-full border border-current/15 bg-current/5 transition hover:border-primary hover:bg-primary hover:text-dark-deeper">
                <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.5 4.1 1.6 5.9L0 24l6.5-1.7a11.7 11.7 0 0 0 5.6 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.1-3.5-8.4ZM12.2 21.7h-.1c-1.8 0-3.6-.5-5.1-1.4l-.4-.2-3.9 1 1-3.8-.2-.4a9.8 9.8 0 1 1 8.7 4.8Zm5.4-7.3c-.3-.1-1.8-.9-2.1-1-.3-.1-.5-.1-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.2-.4-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6l.5-.6c.2-.2.2-.3.3-.5.1-.2.1-.4 0-.6-.1-.1-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5H8c-.2 0-.6.1-.9.4-.3.3-1.2 1.2-1.2 2.9s1.2 3.3 1.4 3.6c.2.2 2.4 3.7 5.9 5.1.8.4 1.5.6 2 .7.8.3 1.6.2 2.2.1.7-.1 1.8-.7 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.2-.6-.4Z"/></svg>
            </a>
        @endif
    </div>
@endif
