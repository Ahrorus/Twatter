@if (current_user()->isNot($user))
<form method="POST" action="{{ route('follow', $user->username) }}">
    @csrf
    <button type="submit"
            class="bg-blue-400 rounded-full shadow py-2 px-10 text-white text-xs">
        {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
    </button>
</form>
@endif
