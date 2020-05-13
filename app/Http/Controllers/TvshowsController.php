<?php

namespace App\Http\Controllers;

use App\ViewModels\ShowTvShowsViewModel;
use App\ViewModels\TvshowPopularViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvshowsController extends Controller
{
    public function index()
    {
        $popularTvShows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['results'];

        $topRatedShows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json()['genres'];

        // dump($popularTvShows);

        $viewModel = new TvshowPopularViewModel($popularTvShows, $topRatedShows, $genres);

        return view('tvshows.index', $viewModel);
    }

    public function show($id)
    {
        $tvshow = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/'.$id.'
        ?api_key=bc47a6237921cf6b019cac5a3bc6ffbb&append_to_response=credits,videos,images')
        ->json();

        // dump($tvshow);

        $viewModel = new ShowTvShowsViewModel($tvshow);

        return view ('tvshows.show', $viewModel);
    }
}
