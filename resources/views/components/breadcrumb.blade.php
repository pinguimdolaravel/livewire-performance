@props(['items'])

<nav class="bg-white flex" aria-label="Breadcrumb">
    <ol class="max-w-screen-xl w-full px-4 flex space-x-4 sm:px-6 lg:px-8">
        <li class="flex">
            <div class="flex items-center">
                <a href="/" class="text-gray-400 hover:text-gray-500">
                    <x-icon home class="flex-shrink-0 h-5 w-5"/>

                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        @foreach($items as $title => $route)
            <x-breadcrumb.item
                :title="$title"
                :route="$route"
            />
        @endforeach
    </ol>
</nav>
