@extends('layout.app')
@section('content')

<h4>Movie Show</h4>

<style>
.main-show{
    width: 90%;
    max-height: 80%;
}
</style>

<div class="">
    <form method="post" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="movieName">Movie Name</label>
            <input required type="text" class="form-control" value="{{$movie->name}}" id="movieName" name="name" placeholder="Movie Name">
        </div>

        <div class="form-group">
            <label for="yearOfRelease">Year of Release</label>
            <select required class="form-control" selected = "{{$movie->year_of_release}}" name="year_of_release" id="yearOfRelease">
                <option value="">Select Year of Release</option>
                <option value="2000" {{$movie->year_of_release == "2000" ? "selected":""}}>2000</option>
                <option value="2001" {{$movie->year_of_release == "2001" ? "selected":""}}>2001</option>
                <option value="2002" {{$movie->year_of_release == "2002" ? "selected":""}}>2002</option>
            </select>
        </div>

        <div class="form-group">
            <label for="actorId">Select Producer</label>
            <select required  id="producer_id" name="producer_id" class="form-control">
                <option value="">Select Producer</option>

                @foreach ($producers as $prod)
                    <option value="{{$prod->id}}" {{ $movie->producer_id == $prod->id ? "selected" : ""}}>{{$prod->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="actorId">Select Actor</label>
            <select required id="multipleSelectExample" name="actor_id[]" class="form-control" multiple>
                <option value="">Select Actor</option>
                
                @foreach ($actors as $actor)
                    <option value="{{$actor->id}}" >{{$actor->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="plotId">Plot</label>
            <textarea type="text" class="form-control" id="plotId" name="plot" placeholder="Plot ..."> {{$movie->plot}}</textarea>
        </div>

        <div class="form-group">
            <label for="imgId">Upload Image</label>
            <input type="file" class="form-control" id="imgId" accept="image/*" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection