<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\actor;
use App\Producer;
class PageController extends Controller
{
    public function actor(){
        $data = array(
            'list' => []
        );
        return view('movie.add-actor')->with($data);
    }

    public function createMovie() {
        $actor = actor::all();
        $producer = Producer::all();
        $data = array(
            'list' => [],
            'actors' => $actor,
            'producers' => $producer
        );
        return view('movie.create-movie')->with($data);
    }

    public function addProducer()
    {
        $data = array(
            'list' => []
        );
        return view('movie.add-producer')->with($data);
    }
    
}
