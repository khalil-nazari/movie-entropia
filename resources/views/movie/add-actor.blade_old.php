@extends('layout.app')
@section('content')
@if (count($list) >0 )
<h4>Edit Actor</h4>
@foreach ($list as $ls)
<form method="POST" action="{{URL::to('update-actor/'.$ls->id)}}">
        {{csrf_field()}}
        <div class="form-group">
              <label for="movieName">Name</label>
              <input required type="text" value="{{$ls->name}}" name='name' class="form-control" id="movieName" placeholder="Actor Name">
        </div>
        <div class="form-group">
            <label for="sexId">Sex</label> <span>{{$ls->sex}}</span>
            <select required name="sex" id="sexId" name='sex' class="form-control">
                <option value="">Selec Gendar</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            {{-- <input name='sex' type="text" class="form-control" id="exampleInputEmail1" placeholder=" email"> --}}
        </div>
        <div class="form-group">
            <label for="dobId">Date Of Birth</label>
            <input required name = "dob" value="{{$ls->dob}}" type="date" class="form-control" id="dobId" placeholder="Date Of Birth">
        </div>
        <div class="form-group">
            <label for="bioId">Bio</label>
            <textarea name = "bio" class="form-control" id="bioId" placeholder="Bio ...">{{$ls->bio}}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endforeach
@else
<h4>Add New Actor</h4>
    <form method="POST" action="post-actor">
            {{csrf_field()}}
            <div class="form-group">
                  <label for="movieName">Name</label>
                  <input required type="text" name='name' class="form-control" id="movieName" placeholder="Actor Name">
            </div>
            <div class="form-group">
                <label for="sexId">Sex</label>
                <select required name="sex" id="sexId" name='sex' class="form-control">
                    <option value="">Selec Gendar</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                {{-- <input name='sex' type="text" class="form-control" id="exampleInputEmail1" placeholder=" email"> --}}
            </div>
            <div class="form-group">
                <label for="dobId">Date Of Birth</label>
                <input required name = "dob" type="date" class="form-control" id="dobId" placeholder="Date Of Birth">
            </div>
            <div class="form-group">
                <label for="bioId">Bio</label>
                <textarea name = "bio" class="form-control" id="bioId" placeholder="Bio ..."></textarea>
            </div>
                <button type="submit" class="btn btn-primary">Create</button>
        </form>
    @endif
    @endsection