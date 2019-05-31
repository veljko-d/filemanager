@extends('layouts.app')

@section('content')
    <div class="">
        <h1 class="text-center text-primary">BROWSE FOLDERS</h1>
        @foreach ($folders as $folder)

            @include ('folders.folder')

        @endforeach
    </div>
@endsection
