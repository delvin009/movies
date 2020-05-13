@extends('layouts.main')

@section('content')

    <div class="actor-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$actor['profile_path']}}" alt="poster" class="w-64 lg:w-96" style="width:24rem">

            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>

                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span class="ml-1">{{$actor['birthday']}} ({{$actor['age']}} Years Old)</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">{{$actor['place_of_birth']}}</span>                   
                </div>

                <p class="text-gray-300 mt-8">{{$actor['biography']}}</p>
                
                <h4 class="font-semibold mt-12">Known For</h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                   @foreach($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{route('movies.show', $movie['id'])}}">
                                <img src="{{$movie['poster_path']}}" 
                                alt="poster" class="hoever:opacity-75 transition ease-in-out duration-150">
                            </a>

                            <a href="{{route('movies.show', $movie['id'])}}" 
                                class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                {{$movie['title']}} 
                            </a>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="credits border-b boeder-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>

            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach($credits as $credit)
                    <li>{{$credit['release_year']}} &middot; <strong>{{$credit['title']}}</strong> as  {{$credit['character']}}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection