@extends('layout.app')
@section('content')
<h5>Actor</h5>
<div class="dropdown float-right">
    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{URL::to('edit_actor')}}">Edit</a>
        <a class="dropdown-item" href="{{URL::to('delete_actor')}}">Delete</a>
    </div>
</div>
<br>
@if (count($list) >0 )
<ul class="list-group mt-3">
  @foreach ($list as $ls)
        <li class="list-group-item">
          {{$ls->name}}
        </li>
        <li class="list-group-item">
            {{$ls->sex}}
        </li>
        <li class="list-group-item">
            {{$ls->dob}}
        </li>
        <li class="list-group-item">
            {{$ls->bio}}
        </li>
      @endforeach
    </ul>
@endif
@endsection