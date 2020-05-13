<div>
    <div class="mt-8">
        <a href="{{route('movies.show', $now['id'])}}">
            <img src="{{ $now['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        <div class="mt-2">
            <a href="{{route('movies.show', $now['id'])}}" class="text-lg mt-2 hover:text-green-300">{{$now['title']}}</a>

            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span><img src="/logo/star.jpg" class="w-4 h-4"></span>
                <span class="ml-1">{{$now['vote_average']}}</span>
                <span class="mx-2">|</span>
                <span>{{$now['release_date']}}</span>
            </div>

            <div class="text=gray-400 text-sm">{{$now['genres']}}</div>
               
            <!-- </div> -->
        </div>
    </div>
</div>