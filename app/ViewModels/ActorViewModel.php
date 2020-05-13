<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{

    public $actor;
    public $credits;

    public function __construct($actor, $credits)
    {
        $this->actor = $actor;
        $this->credits = $credits;
    }

    public function actor()
    {
        // return collect($this->actor)->dump();

        return collect($this->actor)->merge([
            'profile_path' => 'https://image.tmdb.org/t/p/w300/'. $this->actor['profile_path'],
            'name' => $this->actor['name'],
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'place_of_birth' => $this->actor['place_of_birth'],
            'biography' => $this->actor['biography'],
            'age' => Carbon::parse($this->actor['birthday'])->age,
            
        ]);
    }

    public function knownForMovies()
    {
        $cast =  collect($this->credits)->get('cast');

        return collect($cast)->where('media_type', 'movie')->sortByDesc('popularity')->take(5)
        ->map(function ($movie) {
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w185/'.$movie['poster_path'],
                'title' => $movie['title'],              
            ]);
        });
    }

    public function credits()
    {
        $cast =  collect($this->credits)->get('cast');

        return collect($cast)->map(function ($movie) {
    
            if(isset($movie['release_date'])){
                $release_date = $movie['release_date']; //for movie
            } 
            elseif(isset($movie['first_air_date'])) {
                $release_date = $movie['first_air_date']; //for tvshows
            } 
            else{
                $release_date = '';
            }  

            if(isset($movie['title'])){  //movietitle
                $title = $movie['title'];
            } 
            elseif(isset($movie['name'])) {  // tvshow name
                $title = $movie['name'];
            } 
            else{
                $title = 'Untitled';
            }  
            
            return collect($movie)->merge([
                'release_date' => $release_date,
                'release_year' => isset($release_date) ? Carbon::parse($release_date)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
            ]);

        })->sortByDesc('release_date');       
    }
}
