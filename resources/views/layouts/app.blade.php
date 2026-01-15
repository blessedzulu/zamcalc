<x-layouts::base :title="$title ?? ''">
    <x-layouts::partials.nav />

    <div class="max-w-6xl mx-auto mt-30">
        {{ $slot }}
    </div>
</x-layouts::base>
