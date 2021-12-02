@props([
    'title',
    'errorMessage' => null
])

<div class="flex flex-col" x-data="{}">
    <x-button outline @click="$refs.btn.click()" class="w-34">
        {{ $title }}
    </x-button>
    <input type="file" class="hidden" x-ref="btn" {{ $attributes }}/>
    <div>
        <x-input.error for="invoice" :message="$errorMessage"/>
    </div>
</div>
