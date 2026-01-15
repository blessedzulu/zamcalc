<x-layouts::base :title="$title ?? ''">

    <x-layouts::partials.header />

    {{ $slot }}

    <x-layouts::partials.footer />
</x-layouts::base>
