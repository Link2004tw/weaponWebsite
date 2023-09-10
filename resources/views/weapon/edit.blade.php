@extends('layouts.app')

@section('title')
    Edit Weapon
@endsection

@section('content')
    <form method="post" action="{{ route('weapons.update', ['weapon' => $weapon]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Weapon Name: </label>
            <input type="text" name="name" id="name" value="{{ $weapon->name }}"/>
            @error("name")
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div>
            <label>Type: </label>
            <input type="text" name="type" id="type" value="{{ $weapon->type }}" />
            @error("type")
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div>
            <label>Weapon Origin: </label>
            <input type="text" name="origin" id="origin" value="{{ $weapon->origin }}" />
            @error("origin")
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div>
            <label>Weapon Production: </label>
            <input type="text" name="production" id="production" value="{{ $weapon->production }}"/>
            @error("production")
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div>
            <label>Weapon Relese Date: </label>
            <input type="text" name="release_date" id="release_date" value="{{ $weapon->release_date }}"/>
            @error("release_date")
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div>
            <label>Weapon Cartridge Type: </label>
            <input type="text" name="cartridge" id="cartridge" value="{{ $weapon->cartridge }}"/>
        </div>
        <div>
            <label>Weapon Description: </label>
            <textarea id="description" name="description">
                {{ $weapon->description }}
            </textarea>
            @error("description")
            <p class="error"> {{$message}} </p>
        @enderror
        </div>
        <div>
            <input type="file" name='photo' id='photo'/>
        </div>
        <div>
            <button type="submit">Edit Weapon</button>
        </div>
    </form>
@endsection