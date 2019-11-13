@extends('layout.app')
@section('content')


<div class="my-3">
    <h5 class="float-left">Producers</h5>
    <a href="{{ url('/producers') }}" class="btn btn-primary float-right">All Producers</a>
</div>

<br><br>
<div class="my-3">
    <ul class="list-group mt-3">
        <li class="list-group-item">
            {{$producer->name}}
        </li>
        <li class="list-group-item">
            {{$producer->sex}}
        </li>
        <li class="list-group-item">
            {{$producer->dob}}
        </li>
        <li class="list-group-item">
            {{$producer->bio}}
        </li>
    </ul>
</div>
@endsection