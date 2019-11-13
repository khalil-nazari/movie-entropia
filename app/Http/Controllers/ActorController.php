<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Actor;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // fetch all actors 
        $actors = Actor::all();

        // send all actor's detail to main list view
        return view('actor.index')->with('actors', $actors); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return to create view
        return view('actor.create');
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
            'name'=>'required',
            'sex'=>'required',
            'dob'=>'required',
            'bio'=>'required',
        ]);
        
        // data
        $form_data = new Actor([
            'name'=> $request->name,
            'sex'=> $request->sex,
            'dob'=> $request->dob,
            'bio'=>$request->bio,
        ]);

        // Save to actor
        $form_data->save();

        // return to main page
        return redirect('/actor')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // fetch the actor with this id 
        $actor = Actor::findOrFail($id);

        // sned actor detail to detail view
        return view('actor.show')->with('actor', $actor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the actor with this $id
        $actor = Actor::findOrFail($id);

        // sent the actor id to edit view
        return view('actor.edit')->with('actor', $actor);
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
         // validation
         $this->validate($request, [
            'name'=>'required',
            'sex'=>'required',
            'dob'=>'required',
            'bio'=>'required',
        ]);

        // form data 
        $update_data = [
            'name'=>$request->name, 
            'dob' => $request->dob, 
            'sex'=>$request->sex, 
            'bio'=> $request->bio
        ];

        // update actor
        Actor::updateOrCreate(['id' => $id] , $update_data);
        
        // return to main page
        return redirect('/actor')->with('success', 'Successfuly Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get actor has this $id and delete
        $movie = Actor::where('id', $id)->delete();

        // Return to main page 
        return redirect('/actor')->with('success', 'Actor has been deleted');
    }
}