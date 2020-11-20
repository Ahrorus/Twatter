<x-app>
    <header class="mb-6 relative">

        <div class="relative">
            <img src="/images/default-profile-banner.jpg"
                 alt=""
                 class="mb-2 rounded-lg"
            >

            <img
                src="{{ current_user()->avatar }}"
                alt=""
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                width="150"
                style="left: 50%"
            >
        </div>

        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @if (current_user()->is($user))
                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 shadow py-2 px-10 text-xs mr-2">
                        Edit Profile
                    </a>
                @endif
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">{{ $user->bio }}</p>

    </header>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
</x-app>
