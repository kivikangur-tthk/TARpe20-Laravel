<x-post-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name):'Categories' }}
            <x-post-icon name="down-arrow"
                class="absolute pointer-events-none"
                style="right: 12px;"
            />
        </button>
    </x-slot>
    <x-post-dropdown-item href="/" :active="request()->routeIs('home')">All</x-post-dropdown-item>
    @foreach ($categories as $category)
        <x-post-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category'))}}"
            :active="request()->has('/?category='.$category->slug)"
        >
            {{ ucwords($category->name) }}
        </x-post-dropdown-item>
    @endforeach
</x-post-dropdown>
