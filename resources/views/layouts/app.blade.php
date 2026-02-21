<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        {{ $slot }}

        @livewireScripts
        <x-toast />
        <div x-data @keydown.meta.shift.f.window.prevent="
    document.querySelectorAll('input, textarea, select').forEach(el => {
        const model = el.getAttribute('wire:model.blur') || el.getAttribute('wire:model.change') || el.getAttribute('wire:model.live') || el.getAttribute('wire:model');
        if (!model) return;
        const values = {
            name: 'Livewire v4 Course',
            category: 'courses',
            description: 'Livewire v4 brings a fresh approach to building dynamic interfaces in Laravel. It simplifies the process of creating reactive components without the need for extensive JavaScript. Developers can focus on PHP while still delivering a smooth user experience.',
            price: 49.99,
            url: 'https://example.com/livewire-v4'
        };
        if (values[model] !== undefined) {
            el.value = values[model];
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });
"></div>
    </body>
</html>
