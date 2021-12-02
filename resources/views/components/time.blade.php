@props(['time'])

<time datetime="{{ $time->toDateTimeLocalString() }}">
    {{ $time->format('F d, Y, h:m:s A') }}
</time>
