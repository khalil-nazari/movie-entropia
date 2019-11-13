@extends('layout.app')
@section('content')

<h4>Add New Producer</h4>
<form method="POST" action="{{ route('producers.store') }}">
    
    @csrf

    <div class="form-group">
        <label for="movieName">Name</label>
        <input required name="name" type="text" class="form-control" id="movieName" placeholder="Producer Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Sex</label>
        <select name="sex" id="sexId" required class="form-control">
            <option value="">Select Gander</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Date Of Birth</label>
        <input name="dob" type="date" class="form-control" id="exampleInputEmail1" placeholder="Date of Birth">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Bio</label>
        <textarea name="bio" class="form-control" id="exampleInputEmail1" placeholder="Bio ..."></textarea>
    </div>
    
    <input type="submit" value="Submit" class="btn btn-primary" />
</form>
@endsection