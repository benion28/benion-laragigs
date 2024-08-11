@extends('layout')

@section('content')@php
    $position = 'Second';
@endphp

<h1>{{$position}} Hi, {{$heading}} </h1>

{{-- @if(count($listings) == 0)
    <p>No listings found</p>
@endif

@foreach($listings as $listing)
    <h2> {{$listing['title']}} </h2>
    <p> {{$listing['description']}} </p>
@endforeach --}}

@unless(count($listings) == 0)
@foreach($listings as $listing)
    <h2>
        <a href="/tests/{{$listing['id']}}">{{$listing['title']}} </a>
    </h2>
    <p> {{$listing['description']}} </p>
@endforeach
@else
    <p>No listings found</p>
@endunless
@endsection