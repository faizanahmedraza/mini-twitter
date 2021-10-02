@unless(current_user()->is($user))
    <form method="POST" action="/profiles/{{$user->username}}/follow">
        @csrf
        <button type="submit" class="bg-blue-400 rounded-full py-2 px-6 shadow text-white text-sm">
            {{current_user()->following($user) ? 'Unfollow' : 'Follow'}}
        </button>
    </form>
@endunless