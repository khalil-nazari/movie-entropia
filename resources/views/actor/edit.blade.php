@extends('layout.app')
@section('content')

<h4>Edit Actor</h4>
<form method="POST" action="{{ route('actor.update', $actor->id) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
              <label for="movieName">Name</label>
              <input required type="text" value="{{$actor->name}}" name='name' class="form-control" id="movieName" placeholder="Actor Name">
        </div>
        <div class="form-group">
            <label for="sexId">Sex</label> <span>{{$actor->sex}}</span>
            <select required name="sex" id="sexId" name='sex' class="form-control">
                <option value="">Selec Gendar</option>
                <option value="Male" {{ $actor->sex == "Male" ? "selected" : "" }} >Male</option>
                <option value="Female" {{ $actor->sex == "Female" ? "selected" : "" }} >Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dobId">Date Of Birth</label>
            <input required name = "dob" value="{{$actor->dob}}" type="date" class="form-control" id="dobId" placeholder="Date Of Birth">
        </div>
        <div class="form-group">
            <label for="bioId">Bio</label>
            <textarea name = "bio" class="form-control" id="bioId" placeholder="Bio ...">{{$actor->bio}}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection