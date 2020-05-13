<div>
    <div class="mt-8">
        <a href="{{route('tvshows.show', $popular['id'])}}">
            <img src="{{ $popular['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        <div class="mt-2">
            <a href="{{route('tvshows.show', $popular['id'])}}" class="text-lg mt-2 hover:text-green-300">{{$popular['name']}}</a>

            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span><img src="/logo/star.jpg" class="w-4 h-4"></span>
                <span class="ml-1">{{ $popular['vote_average']}}</span>
                <span class="mx-2">|</span>
                <span>{{ $popular['first_air_date']}}</span>
            </div>

            <div class="text=gray-400 text-sm">{{ $popular['genres']}}</div> 
        </div>
    </div>
</div> 
