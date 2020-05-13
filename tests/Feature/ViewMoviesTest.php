<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function the_main_page_shows_correct_info()
    {
        // $this->withoutExceptionHandling();

        Http::fake([
            'https://api.themoviedb.org/3/movie/popular?api_key=bc47a6237921cf6b019cac5a3bc6ffbb' => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/now_playing?api_key=bc47a6237921cf6b019cac5a3bc6ffbb' => $this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/genre/movie/list?api_key=bc47a6237921cf6b019cac5a3bc6ffbb' => $this->fakeGenres(),

        ]);

        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();

        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movies');

        $response->assertSee('Crime, Drama, Thriller');

        $response->assertSee('Now Playing');
        $response->assertSee('Now Playing Fake Movie');
    }

    // public function the_movie_page_shows_correct_info()
    // {
    //     Http::fake([
    //         'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
    //     ]);

    //     $response = $this->get(route('movies.show', 419704));

    //     $response->assertSee('Fake Ad Astra');
    //     $response->assertSee('Brad Pitt');
    //     $response->assertSee('Liv Tyler');  
    //     $response->assertSee('John Ortiz');  
    // }

    private function fakePopularMovies()
    {
        return Http::response([
                
            'results' => [
                [
                    "popularity" => 99.33,
                    "vote_count" => 8,
                    "video" => false,
                    "poster_path" => "/fcJz5j4xo6YB7BHL72taslHuF2Z.jpg",
                    "id" => 560204,
                    "adult" => false,
                    "backdrop_path" => "/5M9s83yNYw6KWkbHK3sAayxnAWQ.jpg",
                    "original_language" => "en",
                    "original_title" => "Fake Movies", //test
                    "genre_ids" => [
                        80,
                        18,
                        53
                    ],
                    "title" => "Fake Movies", //test
                    "vote_average" => 7.1,
                    "overview" => "Kyle and Swin live by the ordere consedly.",
                    "release_date" => "2020-05-05",
                ]
            ]

        ], 200);
    }

    private function fakeNowPlayingMovies()
    {
        return Http::response([

            'results' => [
                [
                    "popularity" => 99.33,
                    "vote_count" => 8,
                    "video" => false,
                    "poster_path" => "/fcJz5j4xo6YB7BHL72taslHuF2Z.jpg",
                    "id" => 560204,
                    "adult" => false,
                    "backdrop_path" => "/5M9s83yNYw6KWkbHK3sAayxnAWQ.jpg",
                    "original_language" => "en",
                    "original_title" => "Now Playing Fake Movie", //test
                    "genre_ids" => [
                        80,
                        18,
                        53
                    ],
                    "title" => "Now Playing Fake Movie", //test
                    "vote_average" => 7.1,
                    "overview" => "Kyle and Swin live by the ordere consedly.",
                    "release_date" => "2020-05-05",   
                ]
            ]

        ], 200);
    }

    private function fakeGenres()
    {
        
    }

    // private function fakeSingleMovie()
    // {
    //     //same as we done like first test here we have to use a large array for testing
    //     //just dump $movie in show function
    // }

    public function the_search_dropdown_works_correctly()
    {
        Http::fake([
            'https://api.themoviedb.org/3/search/movie?api_key=bc47a6237921cf6b019cac5a3bc6ffbb&query=Titanic' => $this->fakeSearchMovies(),
        ]);

        Livewire::test('search-dropdown')
        ->assertDontSee('titanic')
        ->set('search', 'titanic')
        ->assertSee('Titanic');
    }

    private function fakeSearchMovies()
    {
        return Http::response([
                
            'results' => [
                [
                    "popularity" => 99.33,
                    "vote_count" => 8,
                    "video" => false,
                    "poster_path" => "/fcJz5j4xo6YB7BHL72taslHuF2Z.jpg",
                    "id" => 560204,
                    "adult" => false,
                    "backdrop_path" => "/5M9s83yNYw6KWkbHK3sAayxnAWQ.jpg",
                    "original_language" => "en",
                    "original_title" => "Titanic", //test
                    "genre_ids" => [
                        80,
                        18,
                        53
                    ],
                    "title" => "Titanic", //test
                    "vote_average" => 7.1,
                    "overview" => "Kyle and Swin live by the ordere consedly.",
                    "release_date" => "2020-05-05",
                ]
            ]

        ], 200);
    }
}
