@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>{{$restaurant->name}}</h3>
        <p>Category:
        @if ($restaurant->genre)
        {{$restaurant->genre->name}}
        @endif
        </p>
        <img src="{{asset($restaurant->photo)}}" alt="{{$restaurant->name}}">
        <p>{{$restaurant->description}}</p>
        <p>{{$restaurant->restaurant_address}}</p>
      </div>
</div>
@endsection
