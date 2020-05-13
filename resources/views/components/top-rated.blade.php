<div>
    <div class="mt-8">
        <a href="{{route('tvshows.show', $toprated['id'])}}">
            <img src="{{ $toprated['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        <div class="mt-2">
            <a href="{{route('tvshows.show', $toprated['id'])}}" class="text-lg mt-2 hover:text-green-300">{{$toprated['name']}}</a>

            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span><img src="/logo/star.jpg" class="w-4 h-4"></span>
                <span class="ml-1">{{ $toprated['vote_average']}}</span>
                <span class="mx-2">|</span>
                <span>{{ $toprated['first_air_date']}}</span>
            </div>

            <div class="text=gray-400 text-sm">{{ $toprated['genres']}}</div> 
        </div>
    </div>
</div>