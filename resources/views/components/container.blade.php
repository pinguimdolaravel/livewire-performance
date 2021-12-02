@props(['sm' => null])

<div {{
        $attributes
            ->class([
                'py-8 xl:py-10 mx-auto px-4 sm:px-6 lg:px-8',
                'max-w-3xl lg:max-w-7xl' => !$sm,
                'max-w-3xl' => $sm,
            ])
    }}>
    {{ $slot }}
</div>
