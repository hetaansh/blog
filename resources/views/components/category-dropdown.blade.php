<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-2 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item>All</x-dropdown-item>

    @foreach($categories as $category)
        <a href="/?category={{$category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
           class="block text-left px-3 text-sm loading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}">{{ ucwords($category->name) }}</a>

    @endforeach
</x-dropdown>
