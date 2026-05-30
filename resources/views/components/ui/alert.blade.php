@props(['type' => 'success'])
<div {{ $attributes->merge(['class' => 'rounded-lg border border-primary/30 bg-primary/10 p-4 text-sm font-bold text-dark-deeper']) }}>
    {{ $slot }}
</div>
