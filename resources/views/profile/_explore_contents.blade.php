@foreach($usersAll as $user)
    <div class="border border-gray-300 rounded-lg border-b-2">
        <div class="p-4">
            <div class="mr-4">
                <a href="{{route('profile',$user->username)}}">
                    <img
                        src="{{$user->avatar}}" class="rounded-full mr-4"
                        alt=""
                        height="40"
                        width="40"
                    >
                </a>
            </div>
            <div>
                <a href="{{route('profile',$user->username)}}">
                    <h5 class="font-bold mb-4">{{$user->name}}</h5>
                </a>
            </div>


        </div>

    </div>

@endforeach
