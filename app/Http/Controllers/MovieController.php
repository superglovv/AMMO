<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use AppRating;

class MovieController extends Controller
{
    //https://www.youtube.com/watch?v=YhA0CSX1HIg (for comments)



    public function index(){
        $movies = Movie::orderBy("created_at", "desc")->get();
        $featuredMovies = Movie::orderBy("rating_star", "desc")->take(3)->get();

        return view("welcome", compact('movies', 'featuredMovies'));

    }

    public function store(Request $request){
        $movie= Movie::create($request->all());

        // Save Photos in Database

        if($request->has("image"))
        {
            $path = $request->file("image")->storePublicly('movies_images');
            $movie->image=$path;
            $movie->save();
        }

        return redirect()->route('welcome');


    }

    public function show(Movie $movie){
        return view("movies.show", compact('movie'));


    }

    public function update(Movie $movie, Request $request){
        $movie->update($request->all());

        // Save Photos in Database

        if($request->has("image"))
        {
            $path = $request->file("image")->storePublicly('movies_images');
            $movie->image=$path;
            $movie->save();
        }

        return redirect()->route('welcome');


    }

    public function destroy(Movie $movie){
        $movie->delete();

        return redirect()->route('welcome')->with("success", "That Movie Page has been Deleted");


    }
}
