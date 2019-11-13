

@extends('layout.app')
@section('content')

@if (count($list) >0 )
    @foreach ($list as $ls)
    <div class="">
        <div class="text">
            <span class="float-left h3">Movie Detail</span>
            
            <div class="dropdown float-right">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{URL::to('edit-movie/'.$ls->id)}}">Edit</a>
                    <a class="dropdown-item" href="{{URL::to('delete-movie/'.$ls->id)}}">Delete</a>
                </div>
            </div>
        </div>

        <br><br>
        
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$ls->name}}</h5>
            </div>

            <img src="{{URL::to('images/'.$ls->image)}}" class="card-img-top w-100">

            <div class="card-body">
                <p class="card-text">Year of release: {{$ls->year_of_release}}</p>

                @php
                $actors = $ls->actors->sortByDesc('id');
                @endphp
                <p>Producer: {{$ls->producer_id}}</p>
                <p>
                    @foreach ($actors as $actor)
                        {{$actor->name}} <br>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    @endforeach
@endif

@endsection