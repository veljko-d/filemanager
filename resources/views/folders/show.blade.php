@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/folders/folder.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/files/file.css') }}" />
@endsection

@section('content')
    <div id="folders">
        <h1>BROWSE FOLDERS</h1>

        <h2><i class='fas fa-folder'></i> {{ $folder->name }}</h2>

        <hr>
        @if (Auth::user())
            @include ('folders.create')
        @endif
        <hr>
        @if (Auth::user())
            @include ('files.create')
        @endif
        <hr>
        @include ('layouts.errors')

        @foreach ($folder->children as $folder)

            @include ('folders.folder')

        @endforeach
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/folder.js') }}"></script>
    <script src="{{ URL::asset('js/file.js') }}"></script>
@endsection
