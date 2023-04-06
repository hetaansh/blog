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

            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl flex-1">
                <h1 class="text-center font-bold text-xl">Edit New Post</h1>
                <form method="post" action="/admin/posts/{{ $post->id }}" class="mt-10" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-6">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>

                        <input class="border border-gray-400 p-3 w-full"
                               type="text"
                               name="title"
                               id="title"
                               value="{{ isset($post) ? $post->title : old('title') }}"
                               required>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>

                        <input class="border border-gray-400 p-3 w-full"
                               type="text"
                               name="slug"
                               id="slug"
                               value="{{ isset($post) ? $post->slug : old('slug') }}"
                               required>
                        @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>

                        <textarea class="border border-gray-400 p-3 w-full"
                                  name="excerpt"
                                  id="excerpt"
                                  required>{{ isset($post) ? $post->excerpt : old('excerpt') }}</textarea>
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>

                        <textarea class="border border-gray-400 p-3 w-full"
                                  name="body"
                                  id="body"
                                  required>{{ isset($post) ? $post->body : old('body') }}</textarea>
                        @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>


                        <select name="category_id" id="category">

                            @foreach(\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="thumbnail"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>

                        <input class="border border-gray-400 p-3 w-full"
                               type="file"
                               name="thumbnail"
                               id="thumbnail"
                               value="{{ old('thumbnail') }}"
                               >
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex border-t border-gray-200 pt-6">
                        <button type="submit"
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                            Update
                        </button>
                    </div>

                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </main>
        </div>
    </section>
</x-layout>
