<a href="/?{{ http_build_query(request()->except('category', 'page')) }}"
   class="block text-left px-3 text-sm loading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">{{ $slot }}</a>
