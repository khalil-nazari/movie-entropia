@extends('layout.app')
@section('content')

<h3>Add New Movie</h3>

<style>
.main-show{
    width: 90%;
    max-height: 80%;
}
</style>

<div class="row mb-3">
    <div class="col-sm-12 col-md-8">
        <form method="post" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="movieName">Movie Name</label>
                <input required type="text" class="form-control" id="movieName" name="name" placeholder="Movie Name">
            </div>

            <div class="form-group">
                <label for="yearOfRelease">Year of Release</label>
                <select required class="form-control" name="year_of_release" id="yearOfRelease">
                    <option value="">Select Year of Release</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                </select>
            </div>

            <div class="form-group">
                <label for="actorId">Select Producer</label>
                <select required  id="producer_id" name="producer_id" class="form-control">
                    <option value="">Select Producer</option>
                    @foreach ($producers as $prod)
                    <option value="{{$prod->id}}">{{$prod->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="actorId">Select Actor</label>
                <select required  id="multipleSelectExample" name="actor_id[]" class="form-control" multiple>
                    <option value="">Select Actor</option>
                    @foreach ($actors as $ac)
                    <option value="{{$ac->id}}">{{$ac->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="plotId">Plot</label>
                <textarea type="text" class="form-control" id="plotId" name="plot" placeholder="Plot ..."></textarea>
            </div>

            <div class="form-group">
                <label for="imgId">Upload Image</label>
                <input type="file" required class="form-control" id="imgId" accept="image/*" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection