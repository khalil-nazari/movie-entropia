@extends('layout.app')
@section('content')

<div class="my-3">
    <h5 class="float-left">Edit Producers</h5>
    <a class="btn btn-danger float-right" href="{{ url('/producers') }}">Cancel</a>
</div>

<br>
<div class="my-3">
    <form method="POST" action="{{ route('producers.update', $producer->id) }}">
        @csrf
        @method('PATCH') 

        <div class="form-group">
              <label for="movieName">Name</label>
              <input required name="name" value="{{$producer->name}}" type="text" class="form-control" id="movieName" placeholder="Producer Name">
        </div>

        <div class="form-group">
            <label for="sexId">Sex</label>
            <select name="sex" id="sexId" required class="form-control">
                <option value="">Select Gander</option>
                <option value="Male" {{ $producer->sex =="Male" ? 'selected': '' }}>Male</option>
                <option value="Female" {{ $producer->sex =="Female" ? 'selected': '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Date Of Birth</label>
            <input required name="dob" type="date" value="{{$producer->dob}}" class="form-control" id="exampleInputEmail1" placeholder="Date of Birth">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Bio</label>
            <textarea required name="bio" class="form-control" id="exampleInputEmail1" placeholder="Bio ...">{{$producer->bio}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


</div>
@endsection