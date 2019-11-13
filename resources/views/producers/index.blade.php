@extends('layout.app')
@section('content')

<div class="my-3">
    <h5 class="float-left">Producers</h5>
    <a class="btn btn-primary float-right" href="{{ route('producers.create') }}">Add Producer</a>
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
    @if (count($producers) >0 )
    <tbody>
        @foreach ($producers as $producer)
        <tr>
            <td><a href="{{ url('/producers', $producer->id)}}"> {{$producer->name}} </a></td>
            <td>{{$producer->sex}}</td>
            <td>{{$producer->dob}}</td>
            <td>{{$producer->bio}}</td>
            <td>
                <form action=" {{ route('producers.destroy', $producer->id) }}" method="post">
                    @csrf 
                    @method('DELETE')
                    <a href="{{ route('producers.edit', $producer->id) }}" class="btn btn-success btn-sm">Edit</a> 
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm" >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
@endsection