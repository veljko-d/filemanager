<div class="folder">
    <div class="folder">
        <p>{{ $folder->name }}</p>
    </div>

    @can('delete', $folder)
    <form method="POST" action="/folders/{{ $folder->id }}">
        @method('DELETE')
        @csrf

        <button type="submit" id="p-del" title="Delete folder">
            <i class='far fa-trash-alt'></i>
        </button>
    </form>
    @endcan
</div>
