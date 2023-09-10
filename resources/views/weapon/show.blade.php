@extends('layouts.app')

@section('title')
    {{ $weapon->name }}
@endsection

@section('content')
    <div>
        <p>{{ $weapon->type }}</p>
        <p>{{ $weapon->photo->name }} </p><img src="{{ asset('storage/images/' . $weapon->photo->name) }}" />
    </div>
    <div>
        <a href="{{ route('weapons.edit', ['weapon' => $weapon, ]) }}">
            Edit Weapon
        </a>
    </div>
    <form action="{{ route('weapons.destroy', ['weapon' => $weapon]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
@endsection