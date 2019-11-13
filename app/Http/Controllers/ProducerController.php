<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producer;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all producers detail and send to listing page.
        $producer = Producer::all();
        return view('producers.index')->with('producers', $producer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return to create view
        return view('producers.create');
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
            'sex' => 'required',
            'dob' => 'required',
            'bio' => 'required'
        ]);

        // data 
        $form_date = new Producer([
            'name' => $request->name,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'bio' => $request->bio
        ]);
        
        // store to producers
        $var = $form_date->save();

        //redirect to main page
        if($var) {
            return redirect('/producers')->with('success', 'Product has been added');
        } else {
            return back()->with('error', 'Failed to add new Producer. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.show')->with('producer', $producer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.edit')->with('producer', $producer);
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
            'name' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'bio' => 'required'
        ]);

        // form data 
        $update_data = [
            'name'=>$request->name, 
            'dob' => $request->dob, 
            'sex'=>$request->sex, 
            'bio'=> $request->bio
        ] ;

        // condition 
        $where = ['id' => $id]; 
        // update producers 
        Producer::updateOrCreate($where , $update_data);
        return redirect('/producers')->with('success', 'Successfuly Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = Producer::where('id', $id)->delete();
        return redirect('/producers')->with('success', 'Actor has been deleted');
    }
}
