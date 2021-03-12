<h3 class="font-bold text-xl mb-4">
    Following</h3>
<ul>
    @forelse(auth()->user()->follows as $user)
        <li>
            <div >
                <a class="flex items-center text-sm mb-4"
                    href="{{route('profile',$user)}}" >
                    <img
                        src="https://i.pravatar.cc/30" class="rounded-full mr-4"
                        alt=""
                        height="50"
                        width="50"
                    >

                    {{$user->name}}
                </a>
            </div>
        </li>
    @empty
        <li> No Friends Yet </li>
    @endforelse
</ul>
