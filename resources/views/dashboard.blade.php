<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweety') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            @section('content')
                <div class="flex-1 lg:mx-10 lg:justify-between">
                    {{--                        tweet box--}}
                    @include('_publish_tweet_box')

                    @include('_timeline')



                </div>
            @endsection
        </div>
    </div>
</x-app-layout>
