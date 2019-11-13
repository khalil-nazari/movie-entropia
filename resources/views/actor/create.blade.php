@extends('layout.app')
@section('content')

<h4>Add New Actor</h4>

<form  method="POST" action="{{ route('actor.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
              <label for="movieName">Name</label>
              <input required type="text" name='name' class="form-control" id="movieName" placeholder="Actor Name">
        </div>

        <div class="form-group">
            <label for="sexId">Sex</label> 
            <select required name="sex" id="sexId" name='sex' class="form-control">
                <option value="">Selec Gendar</option>
                <option value="Male" >Male</option>
                <option value="Female" >Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dobId">Date Of Birth</label>
            <input required name = "dob"  type="date" class="form-control" id="dobId" placeholder="Date Of Birth">
        </div>

        <div class="form-group">
            <label for="bioId">Bio</label>
            <textarea name = "bio" class="form-control" id="bioId" placeholder="Bio ..."></textarea>
        </div>

        <input type="submit" value="Add" name="submitbtn"  class="btn btn-primary">
    </form>
@endsection