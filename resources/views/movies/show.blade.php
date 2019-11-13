@extends('layout.app')
@section('content')

<div class="my-3">
        <h5 class="float-left">Movie Detail</h5>
        <a href="{{ url('/movies') }}" class="btn btn-primary float-right">All Movies</a>
    </div>
<br><br>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{$movie->name}}</h5>
    </div>

    <img src="{{URL::to('images/'.$movie->image)}}" class="card-img-top w-100">

    <div class="card-body">
        <p class="card-text">Year of release: {{$movie->year_of_release}}</p>

        @php
            $actors = $movie->actors->sortByDesc('id');
        @endphp
        <p>Producer: {{ $movie->producer_id }}</p>
        <p>
            @foreach ($actors as $actor)
                {{$actor->name}} <br>
            @endforeach
        </p>
    </div>
</div>

@endsection