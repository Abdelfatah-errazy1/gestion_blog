<x-dropdown>
    <x-slot name="trigger" >
        {{-- @dd($currentCategory) --}}
        <button class="bg-transparent py-2 pl-3 pr-9 text-sm font-semibold flex lg:inline-flex w-32">
            {{ isset($currentCategory) ? ucwords( $currentCategory->name) : 'Categories' }}
            @php
                $name="down-arrow";
            @endphp
            <x-icon class="absolute pointer-events-none" style="right: 12px;" :name="$name" />

            
        </button>
    </x-slot>
    <x-dropdown-item href="/{{ http_build_query(request()->except('category','page')) }}" :active="request()->routeIs('home')">All</x-dropdown-item> 
   
        @foreach ($categories as $category)
            @php
                $active=isset($currentCategory) && $currentCategory->is($category);
            @endphp
            <x-dropdown-item href="{{'?category=' . $category->slug .'&'. http_build_query(request()->except('category','page')) }}"
                :active='$active'
                >
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
</x-dropdown>
   