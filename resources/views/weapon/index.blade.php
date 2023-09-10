@extends('layouts.app')

@section('title')
    Weapons
@endsection

@section('content')
    @foreach ($weapons as $weapon)
        <a href="{{ route('weapons.show', ['weapon' => $weapon ]) }}">{{ $weapon->name }}</a>
    @endforeach
@endsection