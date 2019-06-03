<div id="folder-create">
    <p><i class="fas fa-folder-plus"></i> Create New Folder</p>

    <form action="/folders" method="POST">
        @csrf

        <input type="text" name="folder_name" size="10">
        <input type="hidden" name="parent_id" size="2" @isset($folder) value="{{ $folder->id }}" @endisset readonly>
        <input type="submit" value="New Folder" />
    </form>
</div>
