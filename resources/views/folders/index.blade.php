@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/folders/folder.css') }}" />
@endsection

@section('content')
    <div class="">
        <h1 class="text-center text-primary">BROWSE FOLDERS</h1>

        @foreach ($folders as $folder)

            @include ('folders.folder')

        @endforeach
    </div>
@endsection
