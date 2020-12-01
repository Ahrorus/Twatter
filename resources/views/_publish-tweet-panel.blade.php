<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form class="" action="/tweets" method="POST">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="Nobody cares about your opinion here."
            required
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <button
                type="submit"
                class="bg-blue-500 rounded-lg shadow py-3 px-10 text-sm text-white hover:bg-blue-600"
                >Twat
            </button>
        </footer>

    </form>

    @error ('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

</div>
