<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvshowPopularViewModel extends ViewModel
{

    public $popularTvShows;
    public $topRatedShows;
    public $genres;

    public function __construct($popularTvShows, $topRatedShows, $genres)
    {
        $this->popularTvShows = $popularTvShows;
        $this->topRatedShows = $topRatedShows;
        $this->genres = $genres;
    }

    public function popularTvShows()
    {
        return $this->formatTvShows($this->popularTvShows);
    }

    public function topRatedShows()
    {
        return $this->formatTvShows($this->topRatedShows);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTvShows($Shows)
    {
        return collect($Shows)->map(function ($tvshows) {

            $genresFormatted = collect($tvshows['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(',');

            return collect($tvshows)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $tvshows['poster_path'],
                'vote_average' => $tvshows['vote_average'] * 10 . '%',
                'first_air_date' => Carbon::parse($tvshows['first_air_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path','id','genre_ids','name','vote_average','overview','first_air_date','genres'
            ]);
        });  
    }
}
