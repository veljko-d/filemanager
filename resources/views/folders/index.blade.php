@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/folders/folder.css') }}" />
@endsection

@section('content')
    <div id="posts">
        <h1>BROWSE FOLDERS</h1>

        <hr>
        @include ('folders.create')
        <hr>
        @include ('files.create')
        <hr>
        @include ('layouts.errors')

        @foreach ($folders as $folder)

            @include ('folders.folder')

        @endforeach
    </div>
@endsection
