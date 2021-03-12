<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweety') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="lg:max-w-7xl  mx-auto sm:px-6 lg:px-8">

                @section('content')
                <div class="flex-1 lg:mx-10 lg:justify-between">
                    <form method="POST" action="{{$user->path()}} "  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{--name--}}
                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="name">
                                Name

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="name"
                                   value="{{$user->name}}"
                                   id="name"
                                   type="text"
                                   required
                            >
                            @error('name')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>

                        {{--user name--}}

                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="username">
                                Username

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="username"
                                   value="{{$user->username}}"
                                   id="username"
                                   type="text"
                                   required
                            >
                            @error('username')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>


                        {{--avatar--}}

                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="avatar">
                                Avatar

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="avatar"
                                   value="{{$user->avatar}}"
                                   id="avatar"
                                   type="file"

                            >
                            @error('avatar')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>


                        {{--email--}}

                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="email">
                                email

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="email"
                                   value="{{$user->email}}"
                                   id="email"
                                   type="email"
                                   required
                            >
                            @error('email')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>


                        {{--password--}}

                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="password">
                                Password

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="password"
                                   id="password"
                                   type="password"
                                   required
                            >
                            @error('password')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>

                        {{--password_confirmation--}}


                        <div class="mb-6">

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="password_confirmation">
                                Confirm Password

                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   type="password"
                                   required
                            >
                            @error('password_confirmation')
                            <p class="text-red-700 text-xs mt-2"> {{ $message }} </p>
                            @enderror

                        </div>


                        {{--submit--}}
                        <div class="mb-6 ">

                            <button type="submit"
                                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                Submit
                            </button>

                        </div>

                        {{--confirmPassword--}}


                    </form>
                </div>

                @endsection
        </div>
    </div>
</x-app-layout>
