<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\ShowMovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/popular?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['genres'];

        // $genres = collect($genres)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });

        $nowPlaying = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/now_playing?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['results'];

        // dd($popularMovies);

        // return view('movies.index', compact('popularMovies','genres','nowPlaying')); now its on viewmodel

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlaying,
            $genres,
        );

        return view('movies.index', $viewModel);
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/'.$id.'
        ?api_key=bc47a6237921cf6b019cac5a3bc6ffbb&append_to_response=credits,videos,images')
        ->json();

        // $genres = collect($genres)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });

        // $casts = Http::withToken(config('services.tmdb.token'))->get('
        // https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        // ->json()['cast']; insted append to response

        // dump($movie);

        // return view('movies.show', compact('movie','genres')); //showmovieviewmodel

        $viewModel = new ShowMovieViewModel(
            $movie,
            // $genres,
        );

        return view('movies.show', $viewModel);
    }
}
