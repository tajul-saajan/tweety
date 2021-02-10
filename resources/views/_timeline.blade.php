@forelse($tweets as $tweet)
    <div class="border border-gray-300 rounded-lg mt-2 shadow border-b-2">
        <div class="flex p-4">
            <div class="mr-4 flex-shrink-0">
                <a href="{{route('profile',$tweet->user->name)}}">
                    <img
                        src="{{$tweet->user->avatar}}" class="rounded-full mr-4"
                        alt=""
                        height="40"
                        width="40"
                    >
                </a>
            </div>
            <div>
                <a href="{{route('profile',$tweet->user->name)}}">
                    <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
                </a>
            </div>


        </div>

        <div>
            <p class="text-sm px-2 pb-3">
                {{$tweet->body}}
            </p>
        </div>
        @livewire('like-tweet', ['tweet' => $tweet])
    </div>
    @empty
        <p> No Tweets Yet </p>
@endforelse
