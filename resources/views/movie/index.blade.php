@extends('layout.app')
@section('content')

<div class="my-3">
    <h5 class="float-left">Movies</h5>
    <a class="btn btn-danger float-right" href="{{URL::to('add-movie')}}">Add Movie</a>
</div>

<br><br>

@if (count($list) >0 )
    @foreach ($list as $ls)
    <div class="">
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

                <a href="{{URL::to('movie/'.$ls->id)}}" class="stretched-link text-success" style="position: relative;">View</a> /
                <a href="{{URL::to('edit-movie/'.$ls->id)}}" class="stretched-link text-success" style="position: relative;">Edit</a> /
                <a href="{{URL::to('delete-movie/'.$ls->id)}}" class="stretched-link text-danger" style="position: relative;">Delete</a>

            </div>
        </div>
    </div>
    @endforeach
@endif

@endsection