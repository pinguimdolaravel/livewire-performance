@props(['title', 'description'])

<div class="border-2 border-gray-400 bg-white rounded-lg px-4 py-3 w-60 h-20">
    <div class="text-xs text-gray-600 tracking-wide uppercase">
        {{ $title }}
    </div>
    <div {{ $attributes->class('text-right text-2xl font-mono text-gray-800 flex items-center mt-2') }}>
        {{ $description }}
    </div>
</div>
