{{--@extends('layouts.app')--}}
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
                    <header class="mb-10 relative">

                        <div class="relative">

                            <img class="w-full rounded-3xl mb-2 w-1/2"
                                 src="/images/banner.jpg"
                                 alt="">
                            <img
                                src="{{$user->avatar}}"
                                alt=""
                                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                                style="width: 200px; left: 50%"
                            >

                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="font-bold lg:text-2xl">{{$user->name}} </h2>
                                <p class="text-sm"> Joined {{$user->created_at->diffForHumans()}} </p>
                            </div>

                            <div class="flex">
                                @if(auth()->user()->is($user))

                                    <a href="{{$user->path('edit')}}"
                                       class="rounded-full bg-blue-200 p-2 shadow border-black">
                                        Edit Profile</a>

                                @endif

                                @unless(auth()->user()->is($user))
                                    <form method="POST" action="/profile/{{$user->username}}/follow">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 rounded-full   p-2 text-white"
                                                dusk="unfollow-me-btn">
                                            {{ auth()->user()->isFollowing($user) ? 'Unfollow Me':'Follow Me' }}
                                        </button>
                                    </form>
                                @endunless

                            </div>
                        </div>

                    </header>
{{--                    @include('_publish_tweet_box')--}}
                    @include('_timeline',['tweets'=> $user->tweets ])
                </div>
            @endsection
        </div>
    </div>
</x-app-layout>
