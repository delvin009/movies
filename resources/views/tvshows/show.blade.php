@extends('layouts.main')

@section('content')

    <div class="tvshow-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$tv['poster_path']}}" alt="poster" class="w-64 lg:w-96" style="width:24rem">

            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$tv['name']}} ({{$tv['first_air_date']}})</h2>

                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><img src="/logo/star.jpg" class="w-4 h-4"></span>
                    <span class="ml-1">{{$tv['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{$tv['first_air_date']}}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">{{$tv['genres']}}</span>                   
                </div>

                <p class="text-gray-300 mt-8">
                    {{$tv['overview']}}
                </p>

                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach($tv['created_by'] as $crew)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if($tv['videos']['results'] > 0)
                    <div class="mt-12">
                        <a target="_blank" href="https://youtube.com/watch?v={{$tv['videos']['results'][0]['key']}}"
                             class="flex inline-flex items-center bg-orange-500  rounded font-semibold px-5 py-4 
                             hover:bg-orange-600 transition ease-in-out duration-150 text-gray-900">                          
                            <img src="/logo/play.png" class="w-4 h-4 mt-1">
                            <span class="ml-2">play trailer</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="movie-cast border-b boeder-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               @foreach($tv['credits']['cast'] as $cast)         
                    <div class="mt-8">
                        <a href="{{route('actors.show', $cast['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w500/' . $cast['profile_path']}}" alt="poster" class="hover:opacity-75 
                            transition ease-in-out duration-150">
                        </a>
                        
                        <div class="mt-2">
                            <a href="{{route('actors.show', $cast['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                            <div class="text-sm text-gray-400">{{$cast['character']}}</div>
                        </div>
                    </div>
                @endforeach           
            </div>
        </div>
    </div>

    <div class="movie-cast border-b boeder-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($tv['backdrops'] as $poster)                   
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500/' . $poster['file_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach              
            </div>
        </div>
    </div>

@endsection
