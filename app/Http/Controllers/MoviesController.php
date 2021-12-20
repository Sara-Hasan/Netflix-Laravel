<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movie = Movies::all();
       return view ('movies.index', compact('movie'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required',
             'movie_image'=>'required|mimes:jpg,jpeg,png|max:5000'
            ]);
        if ($request->hasFile('movie_image')) {
            $image = $request->movie_image;
            $nameimage = time().'-'.$image->getClientOriginalName();
            $image->move('storage/uploads', $nameimage);
            //     // Save the file locally in the storage/public/ folder under a new folder named /product
            //     $request->movie_image->store('uploads', 'public');

            // // Store the record, using the new file hashname which will be it's new filename identity.
                $movie = new Movies([
                'movie_name' => $request->movie_name,
                'movie_description' => $request->movie_description,
                'movie_gener' => $request->movie_gener,
                'movie_image'  => 'storage/uploads/' . $nameimage
            ]);
        }
        $movie->save();
        return redirect()->route('movies.index')
        ->with('success','movies has been created successfully.');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Movies $movie)
    {
        return view('movies',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(Movies $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movies $movie )
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_description' => 'required',
            'movie_gener' => 'required'
            ]);
            $movie->movie_name = $request->movie_name;
            $movie->movie_description = $request->movie_description;
            $movie->movie_gener = $request->movie_gener;
            $movie->save();
            return redirect()->route('movies.index')
            ->with('success','movies Has Been updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movies $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
        ->with('success','movies has been deleted successfully');
    }
}
