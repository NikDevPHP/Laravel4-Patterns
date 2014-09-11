@extends('masterlayout')
@section('content')

@foreach($users as $user)
    <li>{{ $user->userinfo }}</li>
@endforeach

@stop
