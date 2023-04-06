@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments"
          class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="" width="60"
                 height="60"
                 class="rounded-full">
            <h2 class="ml-4">Want to participate? </h2>
        </header>

        <div class="mt-5">
                            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                                      placeholder="Comment here/" required></textarea>
            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end border-t border-gray-200 pt-6">
            <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                Post
            </button>
        </div>
    </form>
@endauth
