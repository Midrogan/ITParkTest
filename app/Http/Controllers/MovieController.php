<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MovieResource::collection(Movie::where('status', true)->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $fields = $request->validated();

        if($request->hasFile('poster')) {
            $fields['poster'] = $request->file('poster')->store('public');
        }

        $movie = Movie::create($fields);

        $movie->genres()->attach($request->genres);

        return new MovieResource($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $fields = $request->validated();

        if ($request->hasFile('poster')) {

            if(!$movie->poster == NULL)
            {
                Storage::delete($movie->poster);
            }

            $fields['poster'] = $request->file('poster')->store('public');
        }

        $movie->update($fields);

        $movie->genres()->sync($request->genres);

        return new MovieResource($movie);
    }

    /**
     * Publish the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function publish(Movie $movie)
    {      
        $movie->update(['status' => true]);

        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        if(!$movie->poster == NULL)
        {
            Storage::delete($movie->poster);
        }

        return response()->json(NULL, 204);
    }
}
