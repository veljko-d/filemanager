<div class="folder">
    <div id="f-name">
        <p><i class='fas fa-folder'></i> {{ $folder->name }}</p>
    </div>

    @can('delete', $folder)
    <form method="POST" action="/folders/{{ $folder->id }}">
        @method('DELETE')
        @csrf

        <button type="submit" id="f-delete" title="Delete folder">
            <i class='far fa-trash-alt'></i>
        </button>
    </form>
    @endcan
</div>
