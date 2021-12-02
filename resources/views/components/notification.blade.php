@php
    $message = json_encode(session()->get('notify'));
    $hasMessage = session()->has('notify');
@endphp

<div
    x-data="{
        @if($hasMessage)
        messages: [ {{ $message }}],
        @else
        messages: [],
        @endif
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        },
    }"
    @notify.window="
        let message = $event.detail;
        messages.push(message);
        setTimeout(() => { remove(message) }, 3500);
    "
    @if($hasMessage)
    x-init="setTimeout(() => { remove({{ $message }}) }, 3500);"
    @endif
    class="fixed inset-0 flex flex-col items-end justify-center px-4 py-6 mt-10 pointer-events-none sm:p-6 sm:justify-start space-y-4"
>
    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
        <div
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="max-w-sm w-full bg-white shadow-xl rounded-lg pointer-events-auto"
        >
            <div class="rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <template x-if="message.type =='success'">
                                <x-icon check-circle class="h-6 w-6 text-sky-600"/>
                            </template>

                            <template x-if="message.type =='warning'">
                                <x-icon warning class="h-6 w-6 text-yellow-600"/>
                            </template>

                            <template x-if="message.type =='danger'">
                                <x-icon x-circle class="h-6 w-6 text-red-600"/>
                            </template>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p x-text="message.message" class="text-sm leading-5 font-medium text-gray-900"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="remove(message)"
                                    class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <x-icon x class="h-5 w-5"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
