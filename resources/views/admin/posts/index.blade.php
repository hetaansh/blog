<x-layout>
    <section class="px-6 py-8">
        <div class="flex">
            <aside class="w-48 flex-shrink-0"
                   style="border-right:solid; border-right-width:1px; border-right-color:gray;">
                <h4 class="font-semibold mb-4">Manage Posts</h4>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All
                            Posts</a>
                    </li>

                    <li>
                        <a href="/admin/posts/create"
                           class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>

            <main class="ml-10 mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl flex-1">
                <!-- component -->
                <body class="antialiased font-sans ">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                    <div class="ml-3">
                                                        <a href="/posts/{{ $post->slug }}" class="text-gray-900 whitespace-no-wrap">
                                                            {{ $post->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Published</span>
                                    </span>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 whitespace-no-wrap">Edit</a>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
{{--                                                <a href="/admin/posts/{{ $post->id }}/delete" class="text-blue-500 whitespace-no-wrap">Delete</a>--}}
                                                <form action="/admin/posts/{{ $post->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </body>

            </main>
        </div>
    </section>
</x-layout>
