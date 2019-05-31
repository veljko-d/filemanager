@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/folders/folder.css') }}" />
@endsection

@section('content')
    <div id="posts">
        <h1>BROWSE FOLDERS</h1>

        @foreach ($folders as $folder)

            @include ('folders.folder')

        @endforeach
    </div>
@endsection
