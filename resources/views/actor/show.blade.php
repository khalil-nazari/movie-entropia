@extends('layout.app')
@section('content')

<h5>Actor</h5>

<a href="{{ url('actor/') }}" class="btn btn-primary float-right">All Actors</a>

<br>
<ul class="list-group mt-3">
    <li class="list-group-item">
       {{$actor->name}}
    </li>
    <li class="list-group-item">
        {{$actor->sex}}
    </li>
    <li class="list-group-item">
        {{$actor->dob}}
    </li>
    <li class="list-group-item">
        {{$actor->bio}}
    </li>
</ul>
@endsection