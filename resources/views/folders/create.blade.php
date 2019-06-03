<div id="folder-create">
    <p><i class="fas fa-plus-square"></i> Create New Folder</p>

    <form action="/folders" method="POST">
        @csrf

        <input type="text" name="folder_name" size="10">
        <input type="text" name="parent_id" size="2">
        <input type="submit" value="New Folder" />
    </form>
</div>
