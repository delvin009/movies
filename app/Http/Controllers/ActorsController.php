<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorViewModel;
use App\ViewModels\PopularActorsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $popularActors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular?api_key=bc47a6237921cf6b019cac5a3bc6ffbb&page='.$page)
        ->json()['results'];

        $viewModel = new PopularActorsViewModel($popularActors, $page);

        return view('actors.index', $viewModel);
    }

    public function show($id)
    {

        $actor = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id.'?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json();

        $credits = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits?api_key=bc47a6237921cf6b019cac5a3bc6ffbb')
        ->json();

        $viewModel = new ActorViewModel($actor, $credits);

        return view('actors.show', $viewModel); 
    }
}
