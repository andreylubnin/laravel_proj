@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="space-x-4">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-5">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring p-2" rows="5" value=""
                    placeholder="Quick, thing of something to say!" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-5 pt-5 border-t border-gray-100">
                <x-submit-button> Post </x-submit-button>
            </div>

        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="text-blue-800 font-semibold hover:underline">Register</a> or <a href="/login"
            class="text-blue-800 font-semibold hover:underline">Log in</a> to leave a
        comment.
    </p>
@endauth
