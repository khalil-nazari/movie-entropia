@extends('layout.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div> 
@endif
@if (count($list) >0 )
<h4>Edit Producer</h4>
@foreach ($list as $ls)
<form method="POST" action="{{URL::to('update-producer/'.$ls->id)}}">
        {{csrf_field()}}
        <div class="form-group">
              <label for="movieName">Name</label>
              <input required name="name" value="{{$ls->name}}" type="text" class="form-control" id="movieName" placeholder="Producer Name">
        </div>
        <div class="form-group">
            <label for="sexId">Sex</label> <span>{{$ls->sex}}</span>
            {{-- <input name="sex" type="text" value="{{$ls->sex}}" class="form-control" id="sexId" placeholder="Gendar"> --}}
            <select name="sex" id="sexId" required class="form-control">
                <option value="">Select Gander</option>
                <option value="Male" {{$ls->sex ? 'selected': ''}}>Male</option>
                <option value="Female" {{$ls->sex ? 'selected': ''}}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Date Of Birth</label>
            <input required name="dob" type="date" value="{{$ls->dob}}" class="form-control" id="exampleInputEmail1" placeholder="Date of Birth">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bio</label>
            <textarea required name="bio" class="form-control" id="exampleInputEmail1" placeholder="Bio ...">{{$ls->bio}}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endforeach

    @else
    <form method="POST" action="post-producer">
        <h4>Add New Producer</h4>
        {{csrf_field()}}
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
            {{-- <input name="sex" type="text" class="form-control" id="exampleInputEmail1" placeholder="Gendar"> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Date Of Birth</label>
            <input name="dob" type="date" class="form-control" id="exampleInputEmail1" placeholder="Date of Birth">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bio</label>
            <textarea name="bio" class="form-control" id="exampleInputEmail1" placeholder="Bio ..."></textarea>
        </div>
            <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endif
    @endsection