<div class="border border-blue-400 rounded-lg px-6 py-6 my-2">
    <form action="/tweets" method="POST">
        @csrf
        <textarea class="w-full p-8" id="tweet_box"
                  name="body"
                  placeholder="whats your tweet?"
                  required
        ></textarea>
        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{auth()->user()->avatar}}"  class="rounded-full mr-4 "
                alt="your avatar" height="50px" width="50px">

            <button dusk="post_tweet"
                type="submit"
                class="bg-blue-500 rounded-lg  shadow py-2 px-2 text-blue-50">

                tweet-a-row
            </button>
        </footer>

    </form>
</div>

@error('body')
    <p class="text-red-700 text-sm "> {{$message}}</p>
@enderror
