<div class="folder">
    <div id="f-name">
        <p><a href="/folders/{{ $folder->id }}"><i class='fas fa-folder'></i> {{ $folder->name }}</a></p>
    </div>

    @can('delete', $folder)
        <form method="POST" action="/folders/{{ $folder->id }}">
            @method('DELETE')
            @csrf

            <button type="submit" id="f-del-upd" title="Delete folder">
                <i class='far fa-trash-alt'></i>
            </button>
        </form>
    @endcan

    @can('update', $folder)
        @include('folders.update')
    @endcan
</div>
