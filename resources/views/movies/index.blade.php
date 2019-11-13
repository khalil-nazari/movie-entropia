@extends('layout.app')
@section('content')

<div class="my-3">
    <h5 class="float-left">Movies</h5>
    <a class="btn btn-primary float-right" href="{{ route('movies.create') }}">Add Movie</a>
</div>

<br><br>

@if (count($movies) > 0)
    @foreach ($movies as $movie)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$movie->name}}</h5>
            </div>

            <a href="{{ url('movies', $movie->id) }}">
                <img src="{{URL::to('images/'.$movie->image)}}" style="height:400px;" class="card-img-top w-100">
            </a>

            <div class="card-body">
                <div class="float-left">
                    <p class="card-text"><b>Released in </b> {{$movie->year_of_release}}</p>
                    <p><b>Produced by </b>: {{$movie->producers}}</p>
                    <p><b>Actors</b><br>
                        @php
                        $actors = $movie->actors->sortByDesc('id');
                        @endphp
                        @foreach ($actors as $actor)
                            {{$actor->name}} <br>
                        @endforeach
                    </p>
                </div>
                
                <div class="float-right">
                    <form action=" {{ route('movies.destroy', $movie->id) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-success btn-sm">Edit</a> 
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm" >Delete</button>
                    </form>
                </div>
                
            </div>
        </div>
    @endforeach
@endif

@endsection