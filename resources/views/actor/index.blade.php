@extends('layout.app')
@section('content')

<div class="my-3">
    <h5 class="float-left">Actors</h5>
    <a class="btn btn-primary float-right" href="{{ route('actor.create') }}">Add Actor</a>
</div>

<br><br>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Sex</th>
            <th>Date of Birth</th>
            <th>Bio</th>
            <th>Action</th>
        </tr>
    </thead>
    @if (count($actors) > 0)
    <tbody>
        @foreach ($actors as $actor)
        <tr>
            <td><a href="{{URL::to('actor/'.$actor->id)}}">{{$actor->name}}</a></td>
            <td>{{$actor->sex}}</td>
            <td>{{$actor->dob}}</td>
            <td>{{$actor->bio}}</td>
            <td>
                
            <form action=" {{ route('actor.destroy', $actor->id) }}" method="post">
                @csrf 
                @method('DELETE')
                <a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-success btn-sm">Edit</a> 
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm" >Delete</button>
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
@endsection