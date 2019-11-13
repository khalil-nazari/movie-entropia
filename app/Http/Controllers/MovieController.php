<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
use App\Producer;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movie $mvoie, Producer $producer)
    {
        $movies = Movie::with('actors')->get(); 
        
        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = Actor::all();
        $producers = Producer::all();
        $data = array(
            'actors'=> $actors,
            'producers'=> $producers
        );
        return view('movies.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required', 
            'year_of_release' => 'required', 
            'producer_id' => 'required', 
            'actor_id' => 'required', 
            'plot' => 'required', 
            'image'  =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        // Data to uploade 
        $data_array = new Movie ([
            'name' => $request->name,
            'year_of_release' => $request->year_of_release,
            'plot' => $request->plot,
            'actor_id'=>$request->actor_id,
            'producer_id' => $request->producer_id,
        ]); 
        $actors = $request['actor_id'];
        
        $image = $request->file('image');
        $image_new_name = 'movie_' . date('YmdHis') .'.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_new_name);
        $data_array['image'] = $image_new_name; 
        
        // save to movie table 
        $data_array->save();
        
        // attach movie and actors 
        $data_array->actors()->attach($actors);
        return redirect('/movies')->with('success', 'Image Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $data = array('movie' => $movie);
        return view('movies.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $actor_movie = DB::table('actor_movie')->select('actor_id', 'movie_id')->Where('movie_id', $id); 
        $actor = Actor::all();
        $producer = Producer::all();
        $data = array(
            'isEdit'=> $id,
            'actors'=> $actor,
            'producers'=> $producer,
            'movie' => $movie,
            'actor_movie'=>$actor_movie
        );
        
        return view('movies.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required', 
            'year_of_release' => 'required', 
            'producer_id' => 'required', 
            'actor_id' => 'required', 
            'plot' => 'required', 
            'movie'  =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //data
        $update_array = [
            'name'=>$request->name,
            'year_of_release'=>  $request->year_of_release,
            'plot'=>$request->plot,
            'producer_id'=>$request->producer_id
        ];
        $actors = $request['actor_id'];
        $image = $request->file('image');
        
        // Image is updated
        if ($image) {
            $new_image =  'movie_' . date('YmdHis') .'.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_image);
            $update_array['image'] = $new_image; 

            //update movie
            $move = Movie::updateOrCreate ( ['id' => $id], $update_array);

            // Update movie actor
            $move->Actors()->sync($actors);

        } else {
            // Update movie
            $move = Movie::updateOrCreate (['id' => $id], $update_array);

            // Update moive_actor
            $move->Actors()->sync($actors);
        }

        return redirect('/movies')->with('success', 'Image Uploaded Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::where('id', $id)->delete();
        return redirect('/movies')->with('success', 'Actor has been deleted');
    }
}
