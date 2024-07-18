<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;

class MovieController extends Controller {
    
    public function index() {
        return Movie::with(['director', 'actors', 'genres', 'ratings'])->get();
    }

    public function show($id) {
        return Movie::with(['director', 'actors', 'genres', 'ratings'])->findOrFail($id);
    }

    public function getDirector($id) {
        return Director::with('movies')->findOrFail($id);
    }

    public function getActor($id) {
        return Actor::with('movies')->findOrFail($id);
    }

    public function getMoviesByGenre() {
        return Genre::with('movies')->get();
    }

    public function getMoviesWithRatings() {
        return Movie::with(['ratings.user'])->get();
    }
}
